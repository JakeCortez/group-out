<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>Create Profile</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--custom css and javascript-->
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/group-out.js"></script>
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
  </head>
  <body>
    <!-- Navigation called from php folder -->
    <?php require_once('../php/nav.php');?>

    <div class="container-fluid">
      <div class = "col-lg-1"></div>
        <article class = "col-lg-10">
            <h1>Create My Profile</h1>
            <form id="profileForm" method="post" class = "basicForm" action = "userprofile-processor.php" enctype="multipart/form-data">
            <label for="firstName" placeholder="my name">First Name</label>
            <input type="text" id="firstName" name="firstName" /><br /><br />
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" /><br />
            <label for="activity">Choose One or More Activities</label>
            <label for="activity[]">Road Bike</label>
            <input name="activity[]" type="checkbox" value="1">
            <label for="activity[]">Mountain Bike</label>
            <input name="activity[]" type="checkbox" value="2">
            <label for="activity[]">Hike</label>
            <input name="activity[]"  type="checkbox" value="3">
            <label for="activity[]">Run</label>
            <input name="activity[]" type="checkbox" value="4">
            <label for="activity[]">Walk</label>
            <input name="activity[]" type="checkbox" value="5">
            <br><br>
            <label for="userCity"><h4>City</h4></label>
            <input type="text" id="city" name="userCity" placeholder="Albuquerque"/><br />
            <label for="userState"><h4>State</h4></label>
            <select name = "userState">
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
            <label for="userZip"><h4>Zip Code</h4></label>
            <input name = "userZip" type="text" id="zipCode" required name="zipCode" placeholder="zipcode" minlength="5" maxlength="10"><br />
            <label for="aboutMe"><h4>Describe Yourself</h4></label>
            <textarea type="text" id="aboutMe" name="aboutMe" placeholder="I am an avid sports enthusiast.."></textarea><br>
            <label for = "userPrivacyLevel"><h4>Privacy Level</h4></label>
            <select name = "userPrivacyLevel">
            <option value = "3">Private - Nobody can see your profile page</option>
            <option value = "1">Public - Anybody can see your profile page</option>
            </select><br>
            <label for="website"><h4>Website (optional)</h4></label>
            <input type="text" id="website" name="website" placeholder="website"/>
            <button type = "submit">Create Your Profile</button>
        </form>
      </article>
      <div class = "col-lg-1"></div>
    </div>

    <!-- footer called from php folder -->
    <?php require_once('../php/footer.html');?>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/validateReg.js"></script>
          <script src="../js/validateLogIn.js"></script>
        </body>
    </html>