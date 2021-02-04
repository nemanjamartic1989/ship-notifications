<?php

namespace App\Http\Controllers;

use App\Repositories\ShipRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Ship;
use Illuminate\Support\Facades\Auth;

class ShipController extends Controller
{
    private $shipRepository;

    public function __construct(ShipRepositoryInterface $shipRepository)
    {
        $this->shipRepository = $shipRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $ships = $this->shipRepository->getAll();

        return view('ships.index', [
            'ships' => $ships
        ]);
    }

    public function create()
    {
        return view('ships.create');
    }

    public function edit($id)
    {
        return $this->shipRepository->editShip($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Ship::$created_rules);

        if ($validator->fails()) {
            return redirect('ships/create')
                ->with('status', 'danger')
                ->with('errors', $validator->errors());
        }
        
        $ship = $this->shipRepository->storeShip($request);

        $ship->save();

        return redirect('ships')
            ->with('message', 'Ship Created Successfully!');
    }

    public function search(Request $request)
    {
        $text = $request->input('text');

        $ships = $this->shipRepository->searchShipData($text);

        return view('ships.search')
            ->with('ships', $ships);
    }

    public function show($id)
    {
        $ship = $this->shipRepository->showShip($id);

        return view('ships.show', ['ship' => $ship]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Ship::$updated_rules);

        if ($validator->fails()) {
            return redirect('ships/edit/' . $id)
                ->with('status', 'danger')
                ->with('errors', $validator->errors());
        }

        $ship = $this->shipRepository->updateShip($request, $id);

        $ship->update();

        return redirect('ships')->with('message', 'Ship Updated Successfully!');
    }

    public function destroy($id)
    {
        $ship = $this->shipRepository->deleteShip($id);

        return redirect('ships')
            ->with('status', 'success')
            ->with('message', 'Ship deleted successfully!');
    }
}
