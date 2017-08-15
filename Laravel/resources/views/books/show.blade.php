@extends('layouts.app')


@section('content')
  <section class="box special">
    <header class="major">

      <span class="image featured"><img data_name:"{{$name_spaces = str_replace(' ', '', $book->title)}}" src="{{ asset('images/'. $book->id.$name_spaces.'.png')}}" alt="Image for {{ $book->title }}" /></span>

      <h2>{{ $book->title }}</h2>
      <p>{{ $book->body }}</p>

    </header>

    <hr id="adventures">
    <div class="row center-xs middle-xs">
      <div class="col-xs-12">

          <section class="box special">

              <a href="/capitulo/{{ $book->chapter_id }}" class="button special fit">              Empezar!</a>

          </section>

      </div>
    </div>

  </section>
@endsection
