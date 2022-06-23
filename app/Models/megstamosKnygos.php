<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class megstamosKnygos extends Model
{
    use HasFactory;

    protected $table = "megstamos";
    protected $fillable = [
        'knygos_id',
        'vartotojo_id',
    ];
}
