<?php 

namespace App\Repositories;

interface RankRepositoryInterface
{
    public function getAll();

    public function createRank();

    public function editRank($id);

    public function storeRank($request);

    public function updateRank($request, $id);

    public function searchRankData($text);

    public function showRank($id);

    public function deleteRank($id);
}