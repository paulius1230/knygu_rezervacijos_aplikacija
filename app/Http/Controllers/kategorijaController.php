<?php

namespace App\Http\Controllers;
use App\Models\kategorija;
use Illuminate\Http\Request;

class kategorijaController extends Controller
{
    public function store(Request $request)
    {
        $kat = new kategorija;
        $kat->pavadinimas = $request->input('kategorijos-pavadinimas');

        if(empty($request->input('kategorijos-pavadinimas'))) 
        {
            return redirect()->back()->with('pavadinimas-failure','Įveskite kategorijos pavadinimą.');
        }

        $kat->save();
        return redirect()->back()->with('kategorija-success','Kategorija prideta');
    }

    public function edit($id)
    {
        $kat = kategorija::findOrFail($id); 
        return view('kategorijaRedagavimas', compact('kat'));    
    }

    public function destroy($id)
    {
        $kat = kategorija::findOrFail($id); 
        $kat->delete();
        return redirect()->back()->with('kategorija-deleted','Kategorija pašalinta');
    }

    public function update(Request $request, $id)
    {
      $kat = kategorija::findOrFail($id);
      $kat->pavadinimas = $request->input('kategorijos-pavadinimas');

      if(empty($request->input('kategorijos-pavadinimas'))) 
      {
          return redirect()->back()->with('pavadinimas-failure','Įveskite kategorijos pavadinimą.');
      }

      $kat->update();
      return redirect()->back()->with('kategorija-updated','Kategorija atnaujinta');
    }
}
