<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tile extends Model
{
    public function cells()
    {
        return $this->hasMany(Tile::class);
    }

    public function StageCells(Request $request)
    {
        return $this->belongsToMany(
            Tile::class, 'stage_cells', 'stage_id', 'object_id')
            ->withPivot('オブジェクト名');
    }
}
