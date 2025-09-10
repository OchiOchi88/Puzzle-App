<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tile extends Model
{
    protected $fillable = ['stage', 'x', 'y', 'type'];
}
