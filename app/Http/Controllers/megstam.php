<?php

namespace App\Http\Controllers;

use App\Models\knyga;
use App\Models\megstamosKnygos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class megstam extends Controller
{
    public function megstama(Request $request, $id)
    {
        $kny = knyga::findOrFail($id);
        $megst = new megstamosKnygos;

        $megst->knygos_id = $request->input('knygos_id');
        $megst->vartotojo_id = Auth::id();

        $megst->save();
        return redirect()->back()->with('megst-status','Knyga prideta i megstamu sarasa');
    }
}
