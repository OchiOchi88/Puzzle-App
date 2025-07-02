<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function cells()
    {
        return $this->hasMany(StageCell::class);
    }

    public function StageCells(Request $request)
    {
        return $this->belongsToMany(
            StageCell::class, 'stage_cells', 'stage_id', 'object_id')
            ->withPivot('オブジェクト名');
    }
}
