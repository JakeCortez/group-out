
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
              <a class="navbar-brand" href="index.php">group<strong>out</strong></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="routes/routes.php" class="dropdown-hover" data-hover="dropdown">Routes<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="routes/create-route.php">Create a Route</a></li>
                    <li><a href="routes/route-map.php">Route Map</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="events/events.php"class="dropdown-hover" data-hover="dropdown">Events<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="events/create-event.php">Create an Event</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="groups/groups.php" class="dropdown-hover" data-hover="dropdown">Groups<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-hover" data-hover="dropdown" role="menu">
                    <li><a href="groups/create-group.php">Create a Group</a></li>
                  </ul>
                </li>
              </ul>
              <?php require_once("check-login-index.php")?>
<!--
<div class="page">
<div class="pageContent">
<div class="message page-status-message" style="display:none;">Loading …</div>
<div class="registration-panel">
<h1 class="clearfix">
Log In
</h1>

<form accept-charset="UTF-8" action="/session" class="website" id="login_form" method="post">
  <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓">
<input name="authenticity_token" type="hidden" value="o+KdX8Ft2Bv0iBYOpIJWyDNJ/p14HgOxTynun68dIZ4=">
  </div>
<div class="facebook">
<a class="button fb-button" href="https://graph.facebook.com/oauth/authorize?response_type=code&amp;client_id=284597785309&amp;redirect_uri=https%3A%2F%2Fwww.strava.com%2Fo_auth%2Ffacebook&amp;scope=user_birthday%2Cuser_location%2Cemail">
Log in using Facebook
</a>
</div>
<h3>Or log in with email</h3>
<input id="plan" name="plan" type="hidden">
<fieldset>
<input autofocus="autofocus" id="email" name="email" placeholder="Your Email" type="email" value="">
<br>
<input id="password" name="password" placeholder="Password" type="password" value="">
</fieldset>
<label>
<input id="remember_me" name="remember_me" type="checkbox" value="on">
<span>Remember me</span>
</label>
<br>
<button class="btn-primary" id="logIn-button" type="submit">Log In</button>
<div class="reset-password"><a href="/account/recover">Forgot your password?</a></div>
</form>
       -->  
              <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="find events and routes">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
              </form>
            
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>