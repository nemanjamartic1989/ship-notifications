<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public $fillable = ['name', 'serial_number', 'image'];

    public static $created_rules = [
        'name' => 'required',
        'serial_number' => 'required|min:8|max:8',
        'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
    ];

    public static $updated_rules = [
        'name' => 'required',
        'serial_number' => 'required|min:8|max:8'
    ];
}
