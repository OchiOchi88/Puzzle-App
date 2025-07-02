<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function cells()
    {
        return $this->hasMany(StageCell::class);
    }
}
