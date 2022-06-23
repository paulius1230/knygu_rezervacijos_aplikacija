<?php

namespace App\Http\Controllers;
use App\Models\knyga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class knygaController extends Controller
{
    public function store(Request $request)
    {
        $kny = new knyga;
        $kny->pavadinimas = $request->input('knygos-pavadinimas');
        $kny->santrauka = $request->input('santrauka');
        $kny->isbn = $request->input('isbn');
        $kny->puslapiu_skaicius = $request->input('puslapiai');
        $kny->kategorijos_id = $request->get('kategorijos_id');

        if(empty($request->input('knygos-pavadinimas'))) 
        {
            return redirect()->back()->with('knygos-pavadinimas-failure','Įveskite knygos pavadinimą.');
        }

        if(empty($request->input('santrauka'))) 
        {
            return redirect()->back()->with('santrauka-failure','Įveskite santrauka.');
        }

        if(empty($request->input('isbn'))) 
        {
            return redirect()->back()->with('isbn-failure','Įveskite ISBN.');
        }

        if(empty($request->input('puslapiai'))) 
        {
            return redirect()->back()->with('puslapiai-failure','Įveskite puslapiu skaiciu.');
        }

        if(empty($request->get('kategorijos_id'))) 
        {
            return redirect()->back()->with('kategorijos_id-failure','Pasirinkite kategorija.');
        }

        if($request->hasfile('nuotrauka'))
        {
            $file = $request->file('nuotrauka');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('nuotraukos/knygos/', $filename);
            $kny->nuotrauka = $filename;
        } else {
            return redirect()->back()->with('photo-failure','Nepasirinkta nuotrauka'); 
        }

        $kny->save();
        return redirect()->back()->with('knyga-success','Knyga prideta');
    }

    public function update(Request $request, $id)
    {
        $kny = knyga::findOrFail($id); 
        $kny->pavadinimas = $request->input('knygos-pavadinimas');
        $kny->santrauka = $request->input('santrauka');
        $kny->isbn = $request->input('isbn');
        $kny->puslapiu_skaicius = $request->input('puslapiai');
        $kny->kategorijos_id = $request->get('kategorijos_id');

        if(empty($request->input('knygos-pavadinimas'))) 
        {
            return redirect()->back()->with('knygos-pavadinimas-failure','Įveskite knygos pavadinimą.');
        }

        if(empty($request->input('santrauka'))) 
        {
            return redirect()->back()->with('santrauka-failure','Įveskite santrauka.');
        }

        if(empty($request->input('isbn'))) 
        {
            return redirect()->back()->with('isbn-failure','Įveskite ISBN.');
        }

        if(empty($request->input('puslapiai'))) 
        {
            return redirect()->back()->with('puslapiai-failure','Įveskite puslapiu skaiciu.');
        }

        if(empty($request->get('kategorijos_id'))) 
        {
            return redirect()->back()->with('kategorijos_id-failure','Pasirinkite kategorija.');
        }

        if($request->hasfile('nuotrauka'))
        {
            $destination = 'nuotraukos/knygos/' . $kny->nuotrauka;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('nuotrauka');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('nuotraukos/knygos/', $filename);
            $kny->nuotrauka = $filename;
        }

        $kny->update();
        return redirect()->back()->with('knyga-updated','Knyga atnaujinta');
    }

    public function edit($id)
    {
        $kny = knyga::findOrFail($id); 
        return view('knygaRedagavimas', compact('kny'));    
    }

    public function destroy($id)
    {
        $kny = knyga::findOrFail($id); 
        $kny->delete();
        return redirect()->back()->with('knyga-deleted','knyga pašalinta');
    }
}
