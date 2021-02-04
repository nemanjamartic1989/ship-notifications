<?php 

namespace App\Repositories;

use Illuminate\Http\Request;

interface RankRepositoryInterface
{
    public function getAll();

    public function createRank();

    public function editRank($id);

    public function storeRank($request);

    public function updateRank(Request $request, $id);

    public function searchRankData($text);

    public function showRank($id);

    public function deleteRank($id);
}