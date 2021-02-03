<?php

namespace App\Http\Controllers;

use App\Repositories\CrewMembersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Ship;
use Illuminate\Support\Facades\Auth;

class CrewMemberController extends Controller
{
    private $crewMemberRepository;

    public function __construct(CrewMembersRepositoryInterface $crewMemberRepository)
    {
        $this->crewMemberRepository = $crewMemberRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $crewMembers = $this->crewMemberRepository->getAll();

        return view('crew-members.index', [
            'crewMembers' => $crewMembers
        ]);
    }

    public function create()
    {
        return $this->crewMemberRepository->createCrewMember();
    }

    public function edit($id)
    {
        return $this->crewMemberRepository->editCrewMember($id);
    }

    public function show($id)
    {
        $crewMember = $this->crewMemberRepository->showCrewMember($id);

        return view('crew-members.show', ['crewMember' => $crewMember]);
    }

    public function search(Request $request)
    {
        $text = $request->input('text');

        $crewMembers = $this->crewMemberRepository->searchCrewMemberData($text);

        return view('crew-members.search')
            ->with('crewMembers', $crewMembers);
    }

    public function store(request $request)
    {
        $crewMember = $this->crewMemberRepository->storeCrewmember($request);

        $crewMember->save();

        return redirect('crew-members')
            ->with('message', 'Crew Member Created Successfully!');
    }

    public function update(Request $request, $id)
    {
        $crewMember = $this->crewMemberRepository->updateCrewMember($request, $id);

        $crewMember->update();

        return redirect('crew-members')->with('message', 'Crew Member Updated Successfully!');
    }

    public function destroy($id)
    {
        $this->crewMemberRepository->deleteCrewMember($id);
    }
}
