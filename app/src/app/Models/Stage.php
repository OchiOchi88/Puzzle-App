<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['stage', 'x', 'y', 'type'];
}
