
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
              <a class="navbar-brand" href="../index.php">group<strong>out</strong></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="../routes/routes.php" class="dropdown-hover" data-hover="dropdown">Routes<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="../routes/create-route.php">Create a Route</a></li>
                    <li><a href="../routes/route-map.php">Route Map</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="../events/events.php"class="dropdown-hover" data-hover="dropdown">Events<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="../events/create-event.php">Create an Event</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="../groups/groups.php" class="dropdown-hover" data-hover="dropdown">Groups<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="../groups/create-group.php">Create a Group</a></li>
                    <li><a href="../groups/group-manage.php">Groups Management</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="../profile/my-profile.php?profileID=<?php $_SESSION["profileID"];?>" class="dropdown-hover" data-hover="dropdown">Profile</a>
                </li>
              </ul>
              
              <?php require_once("check-login.php")?>
              
              <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="find events and routes">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
              </form>
            
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>