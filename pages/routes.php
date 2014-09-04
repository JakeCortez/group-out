 <!DOCTYPE html>
<html>

<?php require_once('../php/head.html');?>
  <body>
    
    <?php require_once('../php/nav.html');?>
    <div class = "container-fluid">
      <div class = "row">
        <section class = "col-lg-9">
          <div class = "row">
            <h3>find a route</h3>
            <h3><small>choose your activity and difficulty level</small></h3>
            <h5>activity:   <a>hike</a> | <a>run</a>    | <a>bike</a> | <a>all</a></h5>
            <h5>difficulty: <a>low</a>  | <a>medium</a> | <a>high</a> | <a>all</a></h5>
          </div>
          <nav class = "row">
            <ul class = "nav nav-tabs" role = "tablist">
              <li>recent</li>
              <li>popular</li>
              <li>random</li>
              <li>all</li>
            </ul>
          </nav>
          <article class = "row">
            <img class = "media-object" src = "../images/287.jpg" alt = "a picture of a kitten">
            <h5 class = "route-name">Route Name</h5>
            <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
            <h4>difficulty: <a class = "dif-lo">lo</a> | <a class = "dif-med">med</a> | <a class = "dif-hi">hi</a></h4>
            <h4 class = "rating-avg">rating: </h4>
            <p class = "voteNum"></p>
          </article>
          <article class = "row">
            <img class = "media-object" src = "../images/287.jpg" alt = "a picture of a kitten">
            <h5 class = "route-name">Route Name</h5>
            <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
            <h4>difficulty: <a class = "dif-lo">lo</a> | <a class = "dif-med">med</a> | <a class = "dif-hi">hi</a></h4>
            <h4 class = "rating-avg">rating: </h4>
            <p class = "voteNum"></p>
          </article>
          <article class = "row">
            <img class = "media-object" src = "../images/287.jpg" alt = "a picture of a kitten">
            <h5 class = "route-name">Route Name</h5>
            <h6 class = "route-location"><small>City Name, ST | created 09.04.2014</small></h6>
            <h4>difficulty: <a class = "dif-lo">lo</a> | <a class = "dif-med">med</a> | <a class = "dif-hi">hi</a></h4>
            <h4 class = "rating-avg">rating: </h4>
            <p class = "voteNum"></p>
          </article>
        </section>
        <aside class = "col-lg-3">
        <?php require_once('../php/sidebar_routes.php');?>
        </aside>
      </div>
    </div>
    <?php require_once('../php/footer.html');?>
  </body>
</html>