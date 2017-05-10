<body class="landing">
  <div id="page-wrapper">

    <!-- Header -->
      <header id="header" class="alt">
        <nav id="nav">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="logIn.php">Log In</a></li>
            <li><a href="signIn.php">Sign In</a></li>
            <li><a href="faq.php">F.A.Q.</a></li>
            <li>
              <div class="btn-group open">
              <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> <?= $userName ?> </a>
              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
                <li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-unlock"></i> Make admin</a></li>
              </ul>
            </div>
           </li>

          </ul>
        </nav>
      </header>
