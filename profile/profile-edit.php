 <!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Groupout profile edit</title>
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
      <article class = "col-lg-9">
        <img src="url" alt="Profile Photo"><br />
        <fieldset title="Other form elements">
          <legend>Profile Photo</legend>
          <label>Upload file
          <input type="file" name="name">
            </label>
        </fieldset>
        <input type="submit">
        
        
        <form id="displayName" method="post" action="">
            <label for="displayName"><h4>Display Name</h4></label>
            <input type="text" name="displayName" id="displayName" placeholder="GroupOut" max="25"><br />
            <h4>Preferred Activities</h4><p> Choose one or more</p>
            <input name="activity" type="checkbox" value="hike">Hike</input>&nbsp; &nbsp;
            <input type="checkbox" value="bike">Bike</input>&nbsp; &nbsp;
            <input type="checkbox" value="run">Run</input>&nbsp; &nbsp;
            <input type="checkbox" value="other">Other<br /><br />
            
            <label for="city"><h4>City</h4></label>
            <input type="text" id="city" name="city" placeholder="Albuquerque"/><br />
            <label for="state"><h4>State</h4></label>
            <select>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                  <option value="AS">American Samoa</option>
                  <option value="GU">Guam</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="VI">Virgin Islands</option>
                  <option value="AA">Armed Forces Americas</option>
                  <option value="AP">Armed Forces Pacific</option>
                  <option value="AE">Armed Froces Euroope</option>
                  <option value="AO">Armed Forces Others</option>
             </select><br />
            
            <label for="zip"><h4>Zip Code</h4></label>
              <input type="text" id="zipCode" name="zipCode" placeholder="87185" minlength="5" maxlength="10"><br />
            <label for="aboutMe"><h4>Describe Yourself</h4></label><br />
              <textarea type="text" id="aboutMe" name="aboutMe" placeholder="I like turtles!"></textarea><br />
            <label for="email"><h4>Email (required)</h4></label>
              <input type"email" name="email" id="email" placeholder="abc@defg.com">
            <label for="website"><div class="optional"><h4>Website (optional)</h4><label>
              <input type="url" class="optional" name="website" placeholder="abc@groupout.com"/></div>
            <label for="faceboook"><div class="optional"><h4>Facebook (optional)</h4><label>
              <input type="text" class="optional" name="facebook" placeholder="@facebook"></div>
            <label for="twitter"><div class="optional"><h4>Twitter (optional)</h4><label>
              <input type="text" class="optional" name="twitter" placeholder="@twitter"/></div>
            <label for="instagram"><div class="optional"><h4>Instagram (optional)</h4><label>
              <input type="text" class="optional" name="instagram" placeholder="@instagram"/></div>
        </form>
      </article>
    </div>
    <?php require_once('../php/footer.html');?>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/validateReg.js"></script>
          <script src="../js/validateLogIn.js"></script>
  </body>
</html>