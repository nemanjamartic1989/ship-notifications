<?php 

namespace App\Repositories;

use App\Models\Ship;
use App\Models\CrewMember;
use Illuminate\Support\Facades\Auth;

class CrewMembersRepository implements CrewMembersRepositoryInterface
{
    public function getAll()
    {
        return CrewMember::with(['ship', 'user'])->where('crew_members.is_deleted', 0)
            ->paginate(10);
    }

    public function createCrewMember()
    {
        $ships = Ship::where('is_deleted', 0)->get();

        return view('crew-members.create')
            ->with('ships', $ships);
    }

    public function editCrewMember($id)
    {
        $crewMember = CrewMember::findOrFail($id);

        $ships = Ship::where('is_deleted', 0)->get();

        return view('crew-members.edit')
            ->with('crewMember', $crewMember)
            ->with('ships', $ships);
    }

    public function storeCrewMember($request)
    {
        $crewMember = new CrewMember;

        $crewMember->name = $request->name;
        $crewMember->surname = $request->surname;
        $crewMember->email = $request->email;
        $crewMember->ship_id = $request->ship_id;
        $crewMember->created_by = Auth::user()->id;
        $crewMember->is_deleted = 0;

        return $crewMember;
    }

    public function updateCrewMember($request, $id)
    {
        $crewMember = CrewMember::findOrFail($id);

        $crewMember->name = $request->name;
        $crewMember->surname = $request->surname;
        $crewMember->email = $request->email;
        $crewMember->ship_id = $request->ship_id;
        $crewMember->created_by = Auth::user()->id;
        $crewMember->is_deleted = 0;

        return $crewMember;
    }

    public function searchCrewMemberData($text)
    {
        return CrewMember::with('ship')->where('is_deleted', 0)
            ->where('name', 'like', '%' . $text . '%')
            ->orWhere('surname', 'like', '%' . $text . '%')
            ->paginate(10);
    }

    public function showCrewMember($id)
    {
        return CrewMember::with('ship')
            ->where('is_deleted', 0)
            ->first();
    }

    public function deleteCrewMember($id)
    {
        $crewMember = CrewMember::find($id);
        
        $crewMember->is_deleted = 1;

        $crewMember->update();
    }
}