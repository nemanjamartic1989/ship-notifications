<?php 

namespace App\Repositories;

use Illuminate\Http\Request;

interface ShipRepositoryInterface
{
    public function getAll();

    public function createShip();

    public function editShip($id);

    public function storeShip($request);

    public function updateShip(Request $request, $id);

    public function searchShipData($text);

    public function showShip($id);

    public function deleteShip($id);
}