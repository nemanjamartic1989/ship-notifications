<?php 

namespace App\Repositories;

interface CrewMembersRepositoryInterface
{
    public function getAll();

    public function createCrewMember();

    public function editCrewMember($id);

    public function storeCrewMember($request);

    public function updateCrewMember($request, $id);

    public function searchCrewMemberData($text);

    public function showCrewMember($id);

    public function deleteCrewMember($id);
}