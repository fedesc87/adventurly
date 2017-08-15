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

        <p style='color: #f39c12;'>
          @for ($i=1; $i <= ($book->rating *2) ; $i++)
            @if ( $i % 2 == 0 )
              <i class="fa fa-star fa-3x"></i>
              {{-- soy par --}}
            @endif
            @if ( $i % 2 != 0 && $i == ($book->rating *2) )
              <i class="fa fa-star-half-o fa-3x"></i>
              {{-- soy inpar --}}
            @endif
          @endfor
          @for ($i= ceil($book->rating); $i < 5 ; $i++)
            <i class="fa fa-star-o fa-3x"></i>
          @endfor
        </p>

          <section class="box special">

              <a href="/capitulo/{{ $book->chapter_id }}" class="button special fit">Empezar!</a>

          </section>

      </div>
    </div>

  </section>
@endsection
