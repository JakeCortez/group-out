
    <!-- Navbar: must be consistent amongst pages-->
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">group-<strong>out</strong></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="routes.php" class="dropdown-hover" data-hover="dropdown">Routes<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="route-map.php">Route Map</a></li>
                    <li><a href="my-routes.php">My Routes</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="events.php"class="dropdown-hover" data-hover="dropdown">Events<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="my-events.php">My Events</a></li>
                    <li><a href="group-events.php">Group Events</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="groups.php" class="dropdown-hover" data-hover="dropdown">Groups<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="my-groups.php">My Groups</a></li>
                    <li><a href="group-manage.php">Groups Management</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="community.php"class="dropdown-hover" data-hover="dropdown">Community<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="people.php">Find People</a></li>
                    <li><a href="forums.php">Forums</a></li>
                    <li><a href="about.php">About Us</a></li>
                  </ul>
                </li>
              </ul>
              <button type="button" class="sign_in btn btn-default navbar-right navbar-btn">Sign in</button>
              <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="find events and routes">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
              </form>
            
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>