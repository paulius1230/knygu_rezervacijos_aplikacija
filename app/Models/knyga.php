<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class knyga extends Model
{
    use HasFactory;

    protected $table = "knygos";
    protected $fillable = [
        'pavadinimas',
        'santrauka',
        'isbn',
        'nuotrauka',
        'puslapiu_skaicius',
        'kategorijos_id',
    ];
}
