<?php
    if(isset($_SESSION["userID"])){
        echo <<<_EOD
        <form action = "php/log-out.php">
            <button type = "submit" class ="logOut btn btn-default navbar-right navbar-btn">Log Out</button>
        </form>
_EOD;
    } else {
        echo <<<_EOD
                <button type="button" class="register btn btn-default navbar-right navbar-btn" data-toggle = "modal" data-target = "#registerModal">Register</button>
              <div class="modal fade registerModal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="Register here" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class = "basicModal">                     
                     <div class = "modalRegister">                     
                        <h2>Register Here!</h2>
                        <form id="registerModalForm" class = "basicForm" method="post" action = "php/registration.php">
                          <input type = "email" id = "userEmail" name = "userEmail" placeholder = "Your email address" class = "required" aria-required = "true"><br>
                          <input type = "password" id = "userPassword" name = "userPassword" placeholder = "password" class = "required" aria-required = "true" minlength = 8 maxlength = 16><br>
                          <input type = "password" id = "confirmPassword" name = "confirmPassword" placeholder = "confirm password" class = "required" aria-required = "true" minlength = 8 maxlength = 16><br>
                          <button class = "btn btn-default" type = "submit">Register</button>
                         </form>
                        <p id="outputArea"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <button type="button" class="log_in btn btn-default navbar-right navbar-btn" data-toggle = "modal" data-target = "#logInModal">Log in</button>
              <div class="modal fade logInModal" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="Log In Here" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class = "basicModal">
                     <div class = "modalLogIn">
                        <h2>Log into your account</h2>
                        <form id="logInModalForm" class = "basicForm" method="post" action = "php/authentication.php">
                          <input type="email" id="userEmail" name="userEmail" placeholder = "Your email address" class = "required" aria-required = "true"><br>
                          <input type = "password" id = "userPassword" name = "userPassword" placeholder = "password" class = "required" aria-required = "true" minlength = 8 maxlength = 16><br>
                          <button class = "btn btn-default" type = "submit">Log In</button>
                          <div class="reset-password"><a href="/account/recover">Forgot your password?</a></div>
                        </form>
                     </div>
                  </div>
                </div>
               </div>
              </div>
_EOD;
    }
?>