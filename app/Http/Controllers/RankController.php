<?php

namespace App\Http\Controllers;

use App\Repositories\RankRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Rank;
use Illuminate\Support\Facades\Auth;

class RankController extends Controller
{
    private $rankRepository;

    public function __construct(RankRepositoryInterface $rankRepository)
    {
        $this->rankRepository = $rankRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $ranks = $this->rankRepository->getAll();

        return view('ranks.index', [
            'ranks' => $ranks
        ]);
    }

    public function create()
    {
        return $this->rankRepository->createRank();
    }

    public function edit($id)
    {
        return $this->rankRepository->editRank($id);
    }

    public function show($id)
    {
        $rank = $this->rankRepository->showRank($id);

        return view('ranks.show', ['rank' => $rank]);
    }

    public function search(Request $request)
    {
        $text = $request->input('text');

        $ranks = $this->rankRepository->searchRankData($text);

        return view('ranks.search')
            ->with('ranks', $ranks);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), Rank::$rules);

        if ($validator->fails()) {
            return redirect('ranks/create')
                ->with('status', 'Validation error!')
                ->with('errors', $validator->errors());
        }
        
        $rank = $this->rankRepository->storeRank($request);

        $rank->save();

        return redirect('ranks')
            ->with('message', 'Rank Created Successfully!');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Rank::$rules);

        if ($validator->fails()) {
            return redirect('ranks/edit/' . $id)
                ->with('status', 'danger')
                ->with('errors', $validator->errors());
        }
        
        $rank = $this->rankRepository->updateRank($request, $id);

        $rank->update();

        return redirect('ranks')->with('message', 'Rank Updated Successfully!');
    }

    public function destroy($id)
    {
        return $this->rankRepository->deleteRank($id);
    }
}
