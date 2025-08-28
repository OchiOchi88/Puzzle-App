<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Palette extends Model
{
    public function cells()
    {
        return $this->hasMany(PaletteCell::class);
    }

    public function PaletteCells(Request $request)
    {
        return $this->belongsToMany(
            PeletteCell::class, 'stage_cells', 'stage_id', 'object_id')
            ->withPivot('オブジェクト名');
    }
}
