@extends('layouts.app')

@section('banner')
  <p>Estas son todas las aventuras que podes jugar</p>
@endsection

@section('content')
  <section class="box special">
    <header class="major">
      <h2>Las mejores aventuras te esperan
      <br />
      para que crees una experiencia única!</h2>
      <p>Viví excitantes aventuras emocionantes<br />
      donde tus deciciones son lo que más importa.</p>
    </header>

    <hr id="adventures">
    <div class="row">
      @foreach ($books as $book)

        <div class="6u 12u(narrower)">

          <section class="box special">
            {{$name_spaces = str_replace(' ', '', $book->title)}}
            <span class="image featured"><img src="images/{{ $book->id.$name_spaces}}.png" alt="Image for {{ $book->title }}" /></span>
            <h3>{{ $book->title }}</h3>
            <p>{{ $book->body }}</p>
            <hr>
            <p style='color: #f39c12;'>
              @for ($i=1; $i <= ($book->rating *2) ; $i++)
                @if ( $i % 2 == 0 )
                  <i class="fa fa-star fa"></i>
                  {{-- soy par --}}
                @endif
                @if ( $i % 2 != 0 && $i == ($book->rating *2) )
                  <i class="fa fa-star-half-o fa"></i>
                  {{-- soy inpar --}}
                @endif
              @endfor
              @for ($i= ceil($book->rating); $i < 5 ; $i++)
                <i class="fa fa-star-o fa"></i>
              @endfor
            </p>

            <ul class="actions">
              <li><a href="/historias/{{$book->id}}" class="button special fit">
                 Empezá!</a>
              </li>
            </ul>
          </section>

        </div>

      @endforeach

  </section>
@endsection
