<?php 

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getAll();

    public function searchUserData($text);

    public function showUser($id);

    public function deleteUser($id);
}