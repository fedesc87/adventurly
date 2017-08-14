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
            <li><a href="exit.php"></i>Exit</a></li>
          @else
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>
          @endif
        @endif

        <li><a href='javascript:colorswitch();' id="csspalette">Light Mode</a></li>

        <script src="{{ asset('js/colorswitch.js') }}"></script>

      </ul>
    </nav>
  </header>
