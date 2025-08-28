<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    public function cells()
    {
        return $this->hasMany(ElementCell::class);
    }

    public function ElementCells(Request $request)
    {
        return $this->belongsToMany(
            ElementCell::class, 'stage_cells', 'stage_id', 'object_id')
            ->withPivot('オブジェクト名');
    }
}
