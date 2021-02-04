<?php 

namespace App\Repositories;

use App\Models\Ship;
use App\Models\CrewMember;
use App\Models\Rank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RankRepository implements RankRepositoryInterface
{
    public function getAll()
    {
        return Rank::join('users', 'ranks.created_by', '=', 'users.id')
        ->where('ranks.is_deleted', 0)
        ->select(
            'ranks.id as id',
            'ranks.name as name',
            'ranks.created_at',
            'users.name as fullname'
        )->paginate(10);
    }

    public function createRank()
    {
        return view('ranks.create');
    }

    public function editRank($id)
    {
        $rank = Rank::findOrFail($id);

        return view('ranks.edit')
            ->with('rank', $rank);
    }

    public function storeRank($request)
    {
        $rank = new Rank;

        $rank->name = $request->name;
        $rank->created_by = Auth::user()->id;
        $rank->is_deleted = 0;

        return $rank;
    }

    public function updateRank(Request $request, $id)
    {
        $rank = Rank::findOrFail($id);

        $rank->name = $request->name;
        $rank->created_by = Auth::user()->id;
        $rank->is_deleted = 0;

        return $rank;
    }

    public function searchRankData($text)
    {
        return Rank::join('users', 'ranks.created_by', '=', 'users.id')
        ->where('ranks.is_deleted', 0)
        ->where('ranks.name', 'like', '%' . $text . '%')
        ->select(
            'ranks.id as id',
            'ranks.name as name',
            'ranks.created_at',
            'users.name as fullname'
        )->paginate(10);
    }

    public function showRank($id)
    {
        return Rank::join('users', 'ranks.created_by', '=', 'users.id')
        ->where('ranks.is_deleted', 0)
        ->where('ranks.id', $id)
        ->select(
            'ranks.id as id',
            'ranks.name as name',
            'ranks.created_at',
            'users.name as fullname'
        )->first();
    }

    public function deleteRank($id)
    {
        $rank = Rank::find($id);
        
        $rank->is_deleted = 1;

        $rank->update();
    }
}