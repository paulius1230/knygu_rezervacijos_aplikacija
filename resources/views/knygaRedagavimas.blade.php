@extends('layouts.app')

@section('content')
<div class="container">
 
<div class="row py-4">
  <h1 class="text-secondary">Knygos redagavimas</h1>
</div>


<div class="row py-4">


<div class="col-12" style="padding: 0;">


@if (session('knygos-pavadinimas-failure'))
    <h6 class="alert alert-danger">{{ session('knygos-pavadinimas-failure') }}</h6>
@endif

@if (session('santrauka-failure'))
    <h6 class="alert alert-danger">{{ session('santrauka-failure') }}</h6>
@endif

@if (session('isbn-failure'))
    <h6 class="alert alert-danger">{{ session('isbn-failure') }}</h6>
@endif

@if (session('puslapiai-failure'))
    <h6 class="alert alert-danger">{{ session('puslapiai-failure') }}</h6>
@endif

@if (session('kategorijos_id-failure'))
    <h6 class="alert alert-danger">{{ session('kategorijos_id-failure') }}</h6>
@endif

@if (session('knyga-updated'))
    <h6 class="alert alert-success">{{ session('knyga-updated') }}</h6>
@endif

<form class="tab-pane container" style="padding: 0;" id="pridetiknyga" action="{{url('atnaujinti-knyga/' . $kny->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="knygos-pavadinimas" class="form-label">Knygos pavadinimas</label>
    <input type="text" class="form-control" value="{{$kny->pavadinimas}}" name="knygos-pavadinimas" id="knygos-pavadinimas">
  </div>
  <div class="mb-3">
    <label for="santrauka" class="form-label">Santrauka</label>
    <input type="text" class="form-control" value="{{$kny->santrauka}}" name="santrauka" id="santrauka">
  </div>
  <div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" class="form-control" value="{{$kny->isbn}}" name="isbn" id="isbn">
  </div>
  <div class="mb-3">
    <label for="puslapiai" class="form-label">Puslapiu skaicius</label>
    <input type="number" class="form-control" value="{{$kny->puslapiu_skaicius}}" name="puslapiai" id="puslapiai">
  </div>
  <select class="form-select mb-3" name="kategorijos_id" aria-label=".form-select-lg example">
  <option disabled>Pasirinkite kategorija</option>
    <option selected value="{{$kny->kategorijos_id}}">{{\App\Models\kategorija::find($kny->kategorijos_id)->pavadinimas}}</option>
  </select>

  <div class="mb-3">
  <label for="nuotrauka" class="form-label">Knygos nuotrauka</label>
  <input class="form-control" type="file" name="nuotrauka" id="nuotrauka">
  </div>
  <div class="w-100">
   <button type="submit" class="btn btn-primary float-end">Pateikti</button>   
  </div>
</form>
</div>

<!-- end of tab-pane -->
  </div>
<!-- end of tab content -->
</div>


<!-- end of col -->
</div>

<!-- end of row -->
</div>

<!-- end of container -->
</div>


@endsection
