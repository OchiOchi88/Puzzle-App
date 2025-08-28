<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class E_E_user extends Authenticatable
{
    protected $fillable = ['stage', 'achievement'];
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [
        'id',
    ];
}
