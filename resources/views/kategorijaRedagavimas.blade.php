@extends('layouts.app')

@section('content')
<div class="container">
 
<div class="row py-4">
  <div class="col-12">
  <h1 class="text-secondary">Kategorijos redagavimas</h1>
  </div>
</div>




<div class="row py-4">


<div class="col-12">


@if (session('pavadinimas-failure'))
<h6 class="alert alert-danger">{{ session('pavadinimas-failure') }}</h6>
@endif

@if (session('kategorija-updated'))
<h6 class="alert alert-success">{{ session('kategorija-updated') }}</h6>
@endif

<form style="padding: 0;" class="tab-pane container active" id="pridetikategorija" action="{{url('atnaujinti-kategorija/' . $kat->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="pavadinimas" class="form-label">Kategorijos pavadinimas</label>
    <input type="text" class="form-control" name="kategorijos-pavadinimas" value="{{$kat->pavadinimas}}" id="pavadinimas">
  </div>
  <div class="w-100">
   <button type="submit" class="btn btn-primary float-end">Redaguoti</button>   
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
