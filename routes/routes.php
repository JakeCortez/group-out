 <?php
 session_start();
 ?>
 
 <!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Group Out</title>
          <!--custom css and javascript-->
      <link href="../css/style.css" rel="stylesheet">
            <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
          <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
      <script src="../js/group-out.js"></script>
  </head>
  
  <body>
    <?php require_once('../php/nav.php');?>
    <div class = "container-fluid">
        <div class = "col-lg-1"></div>
        <section class = "col-lg-10 col-md-10 col-sm-10">
          <div class = "page_info">
            <h2>find a route</h2>
            <h3><small>choose your activity and difficulty level</small></h3>
            <h5>activity:   <a>hike</a> | <a>run</a>    | <a>bike</a> | <a>all</a></h5>
            <h5>difficulty: <a>low</a>  | <a>medium</a> | <a>high</a> | <a>all</a></h5>
          </div>
          <nav class = "navbar-default navbar" role = "navigation">
          <div class = "route-nav">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#recent" role="tab" data-toggle="tab">recent</a></li>
              <li><a href="#popular" role="tab" data-toggle="tab">popular</a></li>
              <li><a href="#random" role="tab" data-toggle="tab">random</a></li>
              <li><a href="#all" role="tab" data-toggle="tab">all</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="recent">
                <div class = "content-default containter-fluid">
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                 <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <div class="tab-pane" id="popular">
                <div class = "content-default containter-fluid">
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                 <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <div class="tab-pane" id="random">
                <div class = "content-default containter-fluid">
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                 <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <div class="tab-pane" id="all">
                <div class = "content-default containter-fluid">
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                <hr>
                <article class = "media">
                  <img class = "media-object pull-left" src = "../images/287.jpg" alt = "a picture of a kitten">
                  <div class = "media-body">
                    <h5 class = "route-name">Route Name</h5>
                    <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
                    <h4>difficulty:</h4>
                    <h4 class = "rating-avg">rating: </h4>
                    <p class = "voteNum"></p>
                  </div>
                </article>
                 <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div> 
          </nav>
        </section>
      <div class = "col-lg-1"></div>
    </div>
    <?php require_once('../php/footer.html');?>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/validateReg.js"></script>
          <script src="../js/validateLogIn.js"></script>
  </body>
</html>