<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\CrewMember;

class Rank extends Model
{
    public $filable = ['name'];

    public static $rules = [
        'name' => 'required'
    ];

    public function crewMembers()
    {
        return $this->belongsToMany(CrewMember::class);
    }
}
