<!-- Header -->
  <header id="header" class="alt">
    <nav id="nav">
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/faq">F.A.Q.</a></li>

        @if (Route::has('login'))
          @if (Auth::check())
            <li> | </li>
            <li><a href="/user">{{ Auth::user()->name }}</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          @else
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>
          @endif
        @endif

        {{-- No se como hacerlo funcionar asi que lo saco --}}
        <li><a href='javascript:colorswitch();' data='Light' id="csspalette">Light Mode</a></li>

        <script>
        function colorswitch () {

        var current = document.getElementById('csspalette').innerHTML;

          if (current == 'Light Mode') {
            document.getElementById('csspalette').innerHTML = 'Dark Mode';
            document.getElementById('csslink').href = 'http://localhost:8000/css/dark.css';
          }

          if (current == 'Dark Mode') {
            document.getElementById('csspalette').innerHTML = 'Light Mode';
            document.getElementById('csslink').href = 'http://localhost:8000/css/main.css';
          }
        }
        </script>

      </ul>
    </nav>
  </header>
