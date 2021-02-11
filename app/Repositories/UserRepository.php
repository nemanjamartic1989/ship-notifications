<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::where('is_deleted', 0)
            ->orderBy('id', 'desc')->paginate(10);
    }

    public function searchUserData($text)
    {
        return User::where('is_deleted', 0)
            ->where('name', 'like', '%' . $text . '%' )
            ->paginate(10);
    }

    public function showUser($id)
    {
        return User::leftJoin('access_levels', 'users.access_level_id', '=', 'access_levels.id')
            ->where('users.is_deleted', 0)
            ->where('users.id', $id)
            ->select(
                'users.id',
                'users.name as fullname',
                'users.email',
                'access_levels.name as access_level_name'
            )->first();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        
        $user->is_deleted = 1;

        $user->update();
    }
}