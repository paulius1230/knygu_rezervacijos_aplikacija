<?php

namespace App\Http\Controllers\administratorius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategorija;
use App\Models\knyga;


class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {
        $kateg = kategorija::all();
        $kny = knyga::all();
        return view('administratorius.dashboard', compact('kateg', 'kny'));
      }
}
