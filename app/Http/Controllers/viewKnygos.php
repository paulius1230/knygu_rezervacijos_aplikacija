<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategorija;
use App\Models\knyga;

class viewKnygos extends Controller
{
    public function knygos($id)
    {
        return view('knygos', ['kny' => knyga::where('kategorijos_id', $id)->get(), 'kat_pav' => kategorija::where('id', $id)->get(),]);
    }
}
