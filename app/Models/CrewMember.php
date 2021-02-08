<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ship;
use App\Models\User;
use App\Models\Rank;

class CrewMember extends Model
{
    public $fillable = ['name', 'surname', 'email', 'ship_id'];

    public static $rules = [
        'name' => 'required|string',
        'surname' => 'required|string',
        'email' => 'required|email|regex:/^.+@.+$/i',
        'ship_id' => 'required'
    ];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ranks()
    {
        return $this->belongsToMany(Rank::class);
    }
}
