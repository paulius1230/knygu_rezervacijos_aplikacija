<?php

namespace App\Http\Controllers;
use App\Models\knyga;
use App\Models\rezervacija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rezervavimasController extends Controller
{
    public function rezervacija(Request $request, $id)
    {
        $kny = knyga::findOrFail($id);
        $rez = new rezervacija;

        $rez->knygos_id = $request->input('knygos_id');
        $rez->vartotojo_id = Auth::id();

        $rez->save();
        return redirect()->back()->with('rezervavimas-status','Knyga Rezervuota');
    }
}
