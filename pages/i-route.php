 <!DOCTYPE html>
<html>

<?php require_once('../php/head.html');?>
  <body>
    
    <?php require_once('../php/nav.html');?>
    <div class = "container-fluid">
      <div class = "row">
        <section class = "col-lg-9">
          <div class = "row">
            <h3>route name &nbsp&nbsp;&nbsp; hike</h3>
            <img class = "media-object" src = "../images/287.jpg" alt = "a picture of a kitten">
            <h4>I'm a google map image</h4>
            <h5>difficulty: <a>low</a>  | <a>medium</a> | <a>high</a> &nbsp;&nbsp; <a>rating****</a></h5>
          </div>
          <div class = "row">
             <h3>recommendations</h3>
              <h5 class="nutrition">nutrition:  water, snacks</h5>
              <h5 class="equipment">equipment:  water, snacks</h5>
              <h5 class="other">other:  water, snacks</h5>
          </div>
          <article class = "row">
            <h4>community comments (5)</h4>
            <h5 class = "route-name">Name</h5> 
            <h5>hiker</h5>
            <h6 class="comment date"><small>09.04.2014</small></h6>
            <div class="i_comment">
              Vestibulum euismod diam ut convallis faucibus.  Praesent sit amet tellus id erat efficitur interdum.
            </div>
            <h5 class = "route-name">Name</h5> 
            <h5>hiker</h5>
            <h6 class="comment date"><small>09.04.2014</small></h6>
            <div class="i_comment">
              Vestibulum euismod diam ut convallis faucibus.  Praesent sit amet tellus id erat efficitur interdum.
            </div>
            <h5 class = "route-name">Name</h5> 
            <h5>hiker</h5>
            <h6 class="comment date"><small>09.04.2014</small></h6>
            <div class="i_comment">
              Vestibulum euismod diam ut convallis faucibus.  Praesent sit amet tellus id erat efficitur interdum.
            </div>
          </article>
            <label for="comment_route">Comment on this route</label>
              <form>
                <textarea rows=5 cols=85 placeholder="Share your thoughts!"> </textarea> 
                <button type="submit">submit</button>
              </form>
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