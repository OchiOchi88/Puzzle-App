<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserElement extends Model
{
    protected $fillable = ['stage_id', 'x', 'y', 'type'];
}
