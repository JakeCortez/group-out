 <!DOCTYPE html>
<html>

<?php require_once('../php/head.html');?>
  <body>
    
    <?php require_once('../php/nav.html');?>
    <div class = "container-fluid">
      <article class = "col-lg-9">
        <img src="url" alt="Profile Picture"><a href="">Upload Profile Image</a>
        <form id="displayName" method="post" action="">
            <label for="displayName"><h4>Display Name</h4></label><p> Choose a name you would like to be visible to public</p><br />
            <h4>Preferred Activities</h4><p> Choose one or more</p>
            <input name="activity" type="checkbox" value="hike">Hike<input type="checkbox" value="bike">Bike<input type="checkbox" value="run">Run<input type="checkbox" value="other">Other<br /><br />
            
            
            <label for="city"><h4>City</h4></label>
            <input type="text" id="city" name="city" placeholder="abc123"/><br />
            <label for="state"><h4>State</h4></label><input type="text" id="state" name="state" placeholder="abc123"/><label for="zip">
            <h4>Zip Code</h4></label><input type="text" id="zipCode" name="zipCode" placeholder="12345" minlength="5" maxlength="5">
            <label for="aboutMe"><h4>Describe Yourself</h4></label>
            <input type="text" max="300" id="aboutMe" name="aboutMe" placeholder="abc123" /> <br />
            <label for="website"><h4>Website (optional)</h4<label><br />
            <input type="url" id="website" name="website" placeholder="abc@groupout.com"/>
            <label for="faceboook"><h4>Facebook (optional)</h4<label><br />
            <input type="text" id="facebook" name="facebook" placeholder="abc@groupout.com"/>
            <label for="twitter"><h4>Twitter (optional)</h4<label><br />
            <input type="text" id="twitter" name="twitter" placeholder="abc123"/>
            <label for="instagram"><h4>Instagram (optional)</h4<label><br />
            <input type="text" id="instagram" name="instagram" placeholder="abc123"/>
            
        </form>
      </article>
    
      <aside class = "col-lg-3">
      <?php require_once('../php/sidebarplaceholder.html');?>
      </aside>
    </div>
    <?php require_once('../php/footer.html');?>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>