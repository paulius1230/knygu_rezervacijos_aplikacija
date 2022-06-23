<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Maisto Užsakymo Aplikacija</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/09c6454e95.js" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">

        <div class="container">
            <div class="row p-4">
                <div class="col-12">
                <div class="float-start">
                <h4 class="text-secondary">Knygu Rezervavimo Aplikacija</h4>
                </div>
                <div class="float-end">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/user_dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Mano paskyra</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Prisijungti</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Užsiregistruoti</a>
                        @endif
                    @endauth
                @endif
                </div>
                </div>
            </div>
            </div>

            <div class="container">
            <div class="row p-4">
                <div class="col-12">
                     <img src="https://s1.15min.lt/images/photos/2019/09/20/original/knygos-5d84dc59c6d02.jpg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
               
            </div>

            <div class="row p-4">
                <div class="col-12">
                <h2 class="text-secondary pb-4">Knygos</h2>

                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://localhost/tt/public/">Kategorija</a></li>
                    @foreach($kat_pav as $pav)
                    <li class="breadcrumb-item active" aria-current="page">{{ $pav->pavadinimas }}</li>
                    @endforeach
                </ol>
                </nav>

                <div class="col-12">
                @if (session('rezervavimas-status'))
                <h6 class="alert alert-success">{{ session('rezervavimas-status') }}</h6>
                @endif
                @if (session('megst-status'))
                <h6 class="alert alert-success">{{ session('megst-status') }}</h6>
                @endif
                </div>

                <div class="row">
                @foreach ($kny as $knyga)
                <div class="col-lg-3 col-sm-12 py-4">
                <div class="card" style="width: 16rem;">
                <div class="card-body">
                    <img src="{{asset('nuotraukos/knygos/' . $knyga->nuotrauka)}}" class="card-img-top" alt="...">
                    <h5 class="card-title">Knygos pavadinimas: {{$knyga->pavadinimas}}</h5>
                    <p class="card-title">Santrauka: {{$knyga->santrauka}}</p>
                    <p class="card-title">Puslapiu skaicius: {{$knyga->puslapiu_skaicius}}</p>
                    <p class="card-title">ISBN: {{$knyga->isbn}}</p>
                    @if (Auth::guest())
                    <div class="alert alert-warning" role="alert">
                    Turite prisijungti, kad galetumete nusipirkti
                    </div>
                    @else
                    <form class="tab-pane container" style="padding: 0;" id="rez" action="{{url('/rezervacija/' . $knyga->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="knygos_id" value="{{$knyga->id}}">
                    <button type="submit" class="btn btn-primary">Rezervuoti</button> 
                    </form>
                    <div class="py-2"></div>
                    <form class="tab-pane container" style="padding: 0;" id="megst" action="{{url('/megstama/' . $knyga->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="knygos_id" value="{{$knyga->id}}">
                    <button type="submit" class="btn btn-primary">Prideti i megstamu sarasa</button> 
                    </form>                     
                    @endif
                </div>
                </div>
                </div>
                @endforeach

                </div>
            </div>



        </div>

    </body>
</html>
