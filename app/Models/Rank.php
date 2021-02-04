<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $filable = ['name'];

    public static $rules = [
        'name' => 'required'
    ];
}
