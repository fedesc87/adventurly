<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Bootstrap -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"> <!-- Estilos Propios -->
</head>
<body class="landing">
  <div id="page-wrapper">

<!-- Header -->
  <header id="header" class="alt">
    <nav id="nav">
      <ul>
        <li><a href="index.php">Home</a></li>
      <?php if (!isset($_SESSION["name"])){
        echo '<li><a href="logIn.php">Log In</a></li>';
        echo '<li><a href="signUp.php">Sign Up</a></li>';
      }
      ?>
        <li><a href="faq.php">F.A.Q.</a></li>
        <?php
        if (isset($_SESSION["name"])) {?>
            <li><a href="user.php"><i class="fa fa-user"></i><?=$pNombre?></a></li>
            <li><a href="exit.php"><i class="fa fa-window-close"></i>Exit</a></li>
        <?php } ?>
        <!-- <i class="fa fa-user fa-fw"> -->
        <li><a href='javascript:colorswitch();' id="csspalette">Light Mode</a></li>

        <script src="assets/js/colorswitch.js"></script>

      </ul>
    </nav>
  </header>

<!-- Banner -->
	<section id="banner">
		<img src="images/Aventurefy-02.png" alt="Logo de Adventurly">
		<h2>Adventurly</h2>
    
    @yield('banner')

	</section>

<!-- Main -->
	<section id="main" class="container">
		<section class="box special">

			@yield('content')

		</section>
	</section>

<!-- CTA -->
	<section id="special">

    @yield('cta')

	</section>

<!-- Footer -->
  <footer id="footer">
    <ul class="icons">
      <li><a href="#" >
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
        </span>
      </a></li>
      <li><a href="#" >
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
        </span>
      </a></li>
      <li><a href="#" >
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
        </span>
      </a></li>
    </ul>
    <ul class="copyright">
      <li>&copy; Adventurly es una idea por Fede, Caro & Pancho. Su derechos son de quien deban ser</li><br>
      <li>Diseño por: <a href="http://campus.digitalhouse.com/login/index.php">Nosotros</a></li>
      <p>

        <script>

          countUsers();
          var users = setInterval(function(){ countUsers() }, 30000);

          function countUsers() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("userCount").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","count.php?q",true);
            xmlhttp.send();
          }
        </script>


      <li class="contador"> Ya somos <span id='userCount'></span> usuarios!<li>
    </ul>
    <br>
    <a href=""><i class="fa fa-bug fa-1x" aria-hidden="true"></i>  Reportanos un bicho!</a>
  </footer>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.dropotron.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollgress.min.js') }}"></script>
<script src="{{ asset('js/skel.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
