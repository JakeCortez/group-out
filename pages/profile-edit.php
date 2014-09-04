 <!DOCTYPE html>
<html>

<?php require_once('../php/head.html');?>
  <body>
    
    <?php require_once('../php/nav.html');?>
    <div class = "container-fluid">
      <article class = "col-lg-9">
       <form id="signUpForm" method="post" action="jquery-form.php">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="john_smith@email.com"/><br />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="abc123" /><br />
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="abc123" /> <br />
        <label for="member">Member Number</label>
        <input type="number" id="member" name="member" placeholder="abc123"/><br />
        <label type="napHours">Nap Hours</label>
        <input type="number" min="0" step="1.75" id="napHours" name="napHours" placeholder="Sleep Well!" /> <br />
        <button type="submit">Nap Time!</button>
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