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
      <li>&copy; Adventurly es una idea por Fede & Pancho. Su derechos son de quien deban ser</li><br>
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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollgress.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
