 <!DOCTYPE html>
<html>
  
  <?php require_once('../php/head.html');?>
  
  <body>
    <div class="page-header">
      <h1>group<strong>out</strong><small> lorem ipsum</small></h1>
    </div>
    
    <?php require_once('../php/nav.html');?>
    
     <div class = "container-fluid">
      <div class = "row">
        <article class = "col-lg-12">
          <!--carousel start-->
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="../images/share_routes.jpg" data-slide-to="0" class="active"></li>
              <li data-target="../images/meet_people.jpg" data-slide-to="1"></li>
              <li data-target="../images/make_events.jpg" data-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="../images/share_routes.jpg" alt="...">
                <div class="carousel-caption">
                  <h3>Share your favorite routes</h3>
                </div>
              </div>
              <div class="item">
                <img src="../images/meet_people.jpg" alt="...">
                <div class="carousel-caption">
                  <h3>Meet new people</h3>
                </div>
              </div>
                <div class="item">
                <img src="../images/make_events.jpg" alt="...">
                <div class="carousel-caption">
                  <h3>Make an event for your friends to attend</h3>
                </div>
              </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </article>
      </div>
      <div class = "row">
        <div class = "col-lg-12" id = "new-user-index">
          <p>Make an account today with just your email!</p>
          <form>
            <input type = "email" placeholder = "your-email@email.com" name = "new-email">
            <input type = "password" placeholder = "password">
            <input type = "password" placeholder = "confirm password">
            <button class = "btn btn-default" type="submit">Sign Up!</button>
          </form>
        </div>
      </div>
    </div>
    
    <?php require_once('../php/footer.html');?>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>