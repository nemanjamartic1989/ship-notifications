<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrewMember;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DB::table('notifications')->paginate(10);

        return view('notifications.index')
            ->with(['notifications', $notifications]);
    }

    public function create()
    {
        $crewMembers = CrewMember::where('is_deleted', 0)->get();

        return view('notifications.create')
            ->with(['crewMembers' => $crewMembers]);
    }
}
