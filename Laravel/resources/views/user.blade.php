@extends('layouts.app')

@section('banner')
  <h3>Bienvenido {{ Auth::user()->name }}</h3>

@endsection

@section('content')
  <section class="box special">
    <header class="major">
      <h4>
        Tus Datos
      </h4>
      <h3>Nombre: <i><b>{{ Auth::user()->name }}</b></i></h3>
      <h3>Email: <i><b>{{ Auth::user()->email }}</b></i></h3>

    </header>
  </section>
@endsection

@section('cta')
  <div class="row xs-middle xs-center">
    <div class="col-xs-12">
        <div class="col-xs-offset-2 col-xs-8">
          <section id="cta">
            <h2>Medallas</h2>
            <div class="row xs-middle xs-center">
              @php
                $puntaje = 0;
              @endphp
            @foreach (Auth::user()->unlocks as $medal)

              <div class="col-xs">
                <img data-name"{{$name_spaces = str_replace('_', '', $medal->name)}}"
                src="/images/Medals/unlocked_{{ $medal->name }}.png" alt="Unlocked {{$name_spaces}} Medals">
                <h4><b>{{$name_spaces}}</b></h4>
              </div>
              @php
                $puntaje += $medal->points;
              @endphp
            @endforeach

            </div>
            <h3><b>Puntos: {{ $puntaje }}</b></h3>
            {{-- <img data-name"{{$name_spaces = str_replace('_', '', $medal->name)}}"
             src="/images/Medals/locked_{{ $medal->name }}.png" alt="Locked {{$name_spaces}} Medals"> --}}
        	</section>
        </div>
    </div>
  </div>

@endsection
