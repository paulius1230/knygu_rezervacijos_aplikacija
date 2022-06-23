<?php

namespace App\Http\Controllers\skaitytojas;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rezervacija;


class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {
        return view('skaitytojas.dashboard', ['rez' => rezervacija::where('vartotojo_id', Auth::id())->get(),]);
      }


}
