<?php 

namespace App\Http\Controllers;

use App\Model\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;
    
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = $this->userRepository->getAll();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function search(Request $request)
    {
        $text = $request->input('text');

        $users = $this->userRepository->searchUserData($text);

        return view('users.search')
            ->with('users', $users);
    }

    public function show($id)
    {
        $user = $this->userRepository->showUser($id);

        return view('users.show')
            ->with(['user', $user]);
    }

    public function destroy($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}