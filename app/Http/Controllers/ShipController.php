<?php

namespace App\Http\Controllers;

use App\Repositories\ShipRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Ship;

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
                ->with('errors', $validator->errors());
        }
        
        $this->shipRepository->storeShip($request);

        return redirect('ships')
            ->with('created', 'Ship Created Successfully!');
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
                ->with('errors', $validator->errors());
        }

        $this->shipRepository->updateShip($request, $id);

        return redirect('ships')->with('updated', 'Ship Updated Successfully!');
    }

    public function destroy($id)
    {
        return $this->shipRepository->deleteShip($id);
    }
}
