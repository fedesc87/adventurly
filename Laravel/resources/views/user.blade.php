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
      <h3>Nombre: {{ Auth::user()->name }}</h3>
      <h3>Email: {{ Auth::user()->email }}</h3>

    </header>
  </section>
@endsection

@section('cta')

  <div class="row xs-middle xs-center">
    <div class="col-xs-offset-2 col-xs-8">
      <section id="cta">
        <h2>Medallas</h2>
        @foreach ($user->medals as $medal)

          @if ($medal->status == 1)
            <img data-name"{{$name_spaces = str_replace('_', '', $user->medal->name)}}"
            src="/images/Medals/unlocked_{{ $user->medal->name }}" alt="Unlocked {{$name_spaces}} Medals">
          @else
            <img data-name"{{$name_spaces = str_replace('_', '', $user->medal->name)}}"
             src="/images/Medals/locked_{{ $user->medal->name }}" alt="Locked {{$name_spaces}} Medals"> 
          @endif

        @endforeach
    	</section>
    </div>
  </div>

@endsection
