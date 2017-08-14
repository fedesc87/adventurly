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
