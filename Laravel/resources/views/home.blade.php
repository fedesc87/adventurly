@extends('layouts.app')

@section('banner')
  <p>Aventuras interactivas donde vos tomás las deciciones!</p>
  <ul class="actions">
    <li><a href="{{ url('/register') }}" class="button special">Anotate</a></li>
    <!-- <li><a href="#adventures" class="button special">Empeza!</a></li> -->
  </ul>
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
      </div>

      <div class="row center-xs middle-xs">
        <div class="col-xs-12">
          <ul class="actions box">
            <li><a href="/historias" class="button fit">Mas Historias</a></li>
          </ul>
        </div>
      </div>
  </section>
@endsection

@section('cta')
  <section id="cta">
    <h2>Anotate para más!</h2>
    <p>Volvete el primero en jugar y recibí un
      <span class="fa-stack">
        <i class="fa fa-dot-circle-o fa-stack-1x"></i>
        <i class="fa fa-sun-o fa-spin fa-fw fa-stack-2x"></i>
      </span>
      parche exclusivo.</p>

    <form>
      <div class="row uniform 50%">
        <div class="8u 12u(mobilep)">
          <input type="email" name="email" id="email" placeholder="Email" />
        </div>
        <div class="4u 12u(mobilep)">
          <input type="submit" value="Anotate" class="fit" />
        </div>
      </div>
    </form>
	</section>
@endsection
