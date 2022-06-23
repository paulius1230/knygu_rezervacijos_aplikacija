<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rezervacija extends Model
{
    protected $table = "rezervacijos";
    protected $fillable = [
        'knygos_id',
        'vartotojo_id',
    ];
}
