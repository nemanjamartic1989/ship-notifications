<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CrewMember;
use App\Models\User;

class Ship extends Model
{
    public $fillable = ['name', 'serial_number', 'image'];

    public static $created_rules = [
        'name' => 'required',
        'serial_number' => 'required|min:8|max:8|unique:ships',
        'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
    ];

    public static $updated_rules = [
        'name' => 'required',
        'serial_number' => 'required|min:8|max:8'
    ];

    public function crewMembers()
    {
        return $this->hasMany(CrewMember::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
