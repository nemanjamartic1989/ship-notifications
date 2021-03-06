<?php 

namespace App\Repositories;

use App\Models\Ship;
use Illuminate\Support\Facades\Auth;

class ShipRepository implements ShipRepositoryInterface
{
    public function getAll()
    {
        return Ship::join('users', 'ships.created_by', '=', 'users.id')
            ->where('ships.is_deleted', 0)
            ->select(
                'ships.id as id',
                'ships.name as ship_name',
                'ships.serial_number',
                'ships.image',
                'users.name as fullname'
            )
            ->paginate(10);
    }

    public function createShip()
    {
        return view('ships.create');
    }

    public function editShip($id)
    {
        $ship = Ship::findOrFail($id);

        return view('ships.edit')->with('ship', $ship);
    }

    public function storeShip($request)
    {
        if ($request->file('image')) {
            $image = time().'.ships.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/ships'), $image);
        } 

        $ship = new Ship;

        $ship->name = $request->name;
        $ship->serial_number = $request->serial_number;
        $ship->image = $image;
        $ship->created_by = Auth::user()->id;
        $ship->is_deleted = 0;

        $ship->save();

        return $ship;
    }

    public function updateShip($request, $id)
    { 
        $ship = Ship::findOrFail($id);

        if ($request->file('image')) {

            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
            ]);
            
            $image = time().'.ships.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/ships'), $image);
            $ship->image = $image;
        } 

        $ship->name = $request->name;
        $ship->serial_number = $request->serial_number;
        
        $ship->created_by = Auth::user()->id;
        $ship->is_deleted = 0;

        $ship->update();

        return $ship;
    }

    public function searchShipData($text)
    {
        return Ship::join('users', 'ships.created_by', '=', 'users.id')
                ->where('ships.is_deleted', 0)
                ->where('ships.name', 'like', '%' . $text . '%' )
                ->orWhere('ships.serial_number', 'like', '%' . $text . '%' )
                ->select(
                    'ships.id as id',
                    'ships.name as ship_name',
                    'ships.serial_number',
                    'ships.image',
                    'users.name as fullname'
                )
                ->paginate(10);
    }

    public function showShip($id)
    {
        return Ship::with("crewMembers")->join('users', 'ships.created_by', '=', 'users.id')
            ->where('ships.is_deleted', 0)
            ->where('ships.id', $id)
            ->select(
                'ships.id as id',
                'ships.name as ship_name',
                'ships.serial_number',
                'ships.image',
                'ships.created_at',
                'users.name as fullname'
            )->first();
    }

    public function deleteShip($id)
    {
        $ship = Ship::find($id);
        
        $ship->is_deleted = 1;

        $ship->update();
    }
}