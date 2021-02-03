<?php 

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::where('is_deleted', 0)
            ->orderBy('id', 'desc')->paginate();
    }

    public function searchUserData($text)
    {
        return User::where('is_deleted', 0)
            ->where('name', 'like', '%' . $text . '%' )
            ->paginate(10);
    }

    public function showUser($id)
    {
        return User::where('is_deleted', 0)
            ->where('id', $id)->first();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->is_deleted = 1;
        $user->update();
    }
}