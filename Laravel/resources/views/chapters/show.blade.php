@extends('layouts.app')

@section('banner')
  <h3>{{$chapter->book->name}}</h3>

@endsection

@section('content')
  <section class="box special">
    <header class="major">
      <div class="row xs-middle xs-center">
        <div class="col-xs-offset-2 col-xs-8">
          <h3>Capítulo {{ $chapter->chapter_num }}</h3>
          <h5><i>{{ $chapter->prev_decision }}</i></h5>
          <h4><b>{{ $chapter->description }}</h4>
        </div>
        <hr>
        <div class="col-xs">
          <ul class="actions">
          @if ($chapter->decision_c_id == 0 && $chapter->decision_b_id == 0)
            @if ($chapter->decision_a_id == 4)
               {{-- le damos medalla --}}
               <li><a href="/historias" class="button special fit">
                  {{ $chapter->decision_a_text }}</a>
               </li>
              @else
            <li><a href="/capitulo/{{ $chapter->decision_a_id }}" class="button special fit">
               {{ $chapter->decision_a_text }}</a>
            </li>
            @endif
          @elseif ($chapter->decision_c_id == 0)

            <li><a href="/capitulo/{{ $chapter->decision_a_id }}" class="button special fit">
               {{ $chapter->decision_a_text }}</a>
            </li>
            <li><a href="/capitulo/{{ $chapter->decision_b_id }}" class="button special fit">
               {{ $chapter->decision_b_text }}</a>
            </li>

          @else
            @if ($chapter->decision_c_id == 3 && $chapter->decision_b_id == 2 && $chapter->decision_a_id == 1)

              <li><a href="/historias/{{ $chapter->book_id }}" class="button special fit">
                 {{ $chapter->decision_a_text }}</a>
              </li>
              <li><a href="/capitulo/{{ $chapter->prev_decision }}" class="button special fit">
                 {{ $chapter->decision_b_text }}</a>
              </li>
              <li><a href="/historias" class="button special fit">
                 {{ $chapter->decision_c_text }}</a>

            @else

            <li><a href="/capitulo/{{ $chapter->decision_a_id }}" class="button special fit">
               {{ $chapter->decision_a_text }}</a>
            </li>
            <li><a href="/capitulo/{{ $chapter->decision_b_id }}" class="button special fit">
               {{ $chapter->decision_b_text }}</a>
            </li>
            <li><a href="/capitulo/{{ $chapter->decision_c_id }}" class="button special fit">
               {{ $chapter->decision_c_text }}</a>
            </li>

            @endif
          @endif
          </ul>
        </div>
      </div>
    </header>
  </section>
@endsection
