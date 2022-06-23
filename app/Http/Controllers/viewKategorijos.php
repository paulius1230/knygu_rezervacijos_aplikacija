<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategorija;

class viewKategorijos extends Controller
{
    public function kategorijos(){
        $kateg = kategorija::all();
        return view('pagrindinis', compact('kateg'));
      }
}
