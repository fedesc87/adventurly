@extends('layouts.app')


@section('content')
  <section class="box special">
    <header class="major">
      <h2>{{ $story->title }}</h2>
      <p>{{ $story->body }}</p>
    </header>

    <hr id="adventures">
    <div class="row">

        <div class="6u 12u(narrower)">

          <section class="box special">
            {{$name_spaces = str_replace(' ', '', $story->title)}}
            <span class="image featured"><img src="{{ asset('images/'. $story->id.$name_spaces.'.png')}}" alt="Image for {{ $story->title }}" /></span>

          </section>

        </div>


  </section>
@endsection
