@extends('layouts.app')

@section('content')


<div class="container">
 
<div class="row py-4">
  <div class="col-12">
  <h1 class="text-secondary">Administratoriaus valdymo panelė</h1>
  </div>
</div>



<div class="row py-4">

<div class="col-12">
  <h2 class="text-secondary pb-2">Kategorijos</h2>
  @if(count($kateg) < 1)
  <div class="text-secondary py-4">Tuščia</div>                                 
  @else
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="text-align: center;  vertical-align: middle;">ID</th>
        <th style="text-align: center;  vertical-align: middle;">Kategorijos pavadinimas</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kateg as $kategorija)
      <tr>
        <td style="text-align: center;  vertical-align: middle;">{{$kategorija->id}}</td>
        <td style="text-align: center;  vertical-align: middle;">{{$kategorija->pavadinimas}}</td>
        <td style="text-align: center;  vertical-align: middle;"><a href="{{ url('redaguoti-kategorija/' . $kategorija->id) }}" class="btn btn-primary btn-sm">Redaguoti</a></td>
        <td style="text-align: center;  vertical-align: middle;"><a href="{{ url('istrinti-kategorija/' . $kategorija->id) }}" class="btn btn-danger btn-sm">Šalinti</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif

  @if (session('pavadinimas-failure'))
    <h6 class="alert alert-danger">{{ session('pavadinimas-failure') }}</h6>
  @endif

  @if (session('kategorija-success'))
    <h6 class="alert alert-success">{{ session('kategorija-success') }}</h6>
  @endif

  @if (session('kategorija-deleted'))
    <h6 class="alert alert-success">{{ session('kategorija-deleted') }}</h6>
  @endif




  <form class="tab-pane container" style="padding: 0;" id="pridetikategorija" action="{{url('admin_dashboard/kategorija')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="kategorijos-pavadinimas" class="form-label">Kategorijos pavadinimas</label>
    <input type="text" class="form-control" name="kategorijos-pavadinimas" id="kategorijos-pavadinimas">
  </div>
  <div class="w-100">
   <button type="submit" class="btn btn-primary float-end">Pateikti</button>   
  </div>
</form>

</div>

<div class="py-2"></div>
<hr>

<div class="col-12">
<h2 class="text-secondary pb-2">Knygos</h2>

@if(count($kny) < 1)
  <div class="text-secondary py-4">Tuščia</div>                                 
  @else
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th style="text-align: center;  vertical-align: middle;">ID</th>
        <th style="text-align: center;  vertical-align: middle;">Pavadinimas</th>
        <th style="text-align: center;  vertical-align: middle;">Santrauka</th>
        <th style="text-align: center;  vertical-align: middle;">ISBN</th>
        <th style="text-align: center;  vertical-align: middle;">Puslapiu skaicius</th>
        <th style="text-align: center;  vertical-align: middle;">Kategorija</th>
        <th style="text-align: center;  vertical-align: middle;">Nuotrauka</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kny as $knyga)
      <tr>
        <td style="text-align: center;  vertical-align: middle;">{{$knyga->id}}</td>
        <td style="text-align: center;  vertical-align: middle;">{{$knyga->pavadinimas}}</td>
        <td style="text-align: center;  vertical-align: middle;">{{$knyga->santrauka}}</td>
        <td style="text-align: center;  vertical-align: middle;">{{$knyga->isbn}}</td>
        <td style="text-align: center;  vertical-align: middle;">{{$knyga->puslapiu_skaicius}}</td>
        <td style="text-align: center;  vertical-align: middle;">{{\App\Models\kategorija::find($knyga->kategorijos_id)->pavadinimas}}</td>
        <td style="text-align: center;  vertical-align: middle;">
        <img src="{{ asset('nuotraukos/knygos/' . $knyga->nuotrauka) }}" width="70px" height="70px" style="object-fit: cover;" alt="nuotrauka">
        </td>
        <td style="text-align: center;  vertical-align: middle;"><a href="{{ url('redaguoti-knyga/' . $knyga->id) }}" class="btn btn-primary btn-sm">Redaguoti</a></td>
        <td style="text-align: center;  vertical-align: middle;"><a href="{{ url('istrinti-knyga/' . $knyga->id) }}" class="btn btn-danger btn-sm">Šalinti</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif


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

@if (session('photo-failure'))
    <h6 class="alert alert-danger">{{ session('photo-failure') }}</h6>
@endif

@if (session('knyga-success'))
    <h6 class="alert alert-success">{{ session('knyga-success') }}</h6>
@endif

@if (session('knyga-deleted'))
    <h6 class="alert alert-success">{{ session('knyga-deleted') }}</h6>
  @endif


@if(count($kateg) < 1)
  <div class="text-secondary py-4">Turi buti bent viena kategorija, kad galetumete prideti knyga</div>                                 
@else
<form class="tab-pane container" style="padding: 0;" id="pridetiknyga" action="{{url('admin_dashboard/knyga')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="knygos-pavadinimas" class="form-label">Knygos pavadinimas</label>
    <input type="text" class="form-control" name="knygos-pavadinimas" id="knygos-pavadinimas">
  </div>
  <div class="mb-3">
    <label for="santrauka" class="form-label">Santrauka</label>
    <input type="text" class="form-control" name="santrauka" id="santrauka">
  </div>
  <div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" class="form-control" name="isbn" id="isbn">
  </div>
  <div class="mb-3">
    <label for="puslapiai" class="form-label">Puslapiu skaicius</label>
    <input type="text" class="form-control" name="puslapiai" id="puslapiai">
  </div>
  <select class="form-select mb-3" name="kategorijos_id" aria-label=".form-select-lg example">
  <option disabled selected>Pasirinkite kategorija</option>
  @foreach ($kateg as $kategorija)
    <option value="{!! $kategorija->id !!}">{{$kategorija->pavadinimas}}</option>
  @endforeach
  </select>
  <div class="mb-3">
  <label for="nuotrauka" class="form-label">Knygos nuotrauka</label>
  <input class="form-control" type="file" name="nuotrauka" id="nuotrauka">
  </div>
  <div class="w-100">
   <button type="submit" class="btn btn-primary float-end">Pateikti</button>   
  </div>
</form>
@endif

</div>

</div>

</div>




@endsection