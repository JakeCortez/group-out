<!DOCTYPE html>
<html class="logged-out fullscreen responsive cycling-background-1 old-login js no-touch history draganddrop localstorage svg fullscreen" lang="en-US" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/TR/html5"><object type="{0C55C096-0F1D-4F28-AAA2-85EF591126E7}" cotype="cs" id="cosymantecbfw" style="width: 100%; height: 0px; display: block; position: absolute; z-index: 99999; top: 0px; left: 0px;"></object><head>
<meta charset="UTF-8">
<head>
    <title>
     USER Log In Page   
    </title>
</head>
<body>
<div class="container">
<header>
<!--
deploy: strava-deploy/20140911-5
instance: i-9a37a6b7
env: 'ec2'
-->
<!--[if lte IE 8]>
<div class='message warning ie7'>
<p>It looks like you're using a version of Internet Explorer that Strava no longer supports. Please <a href='http://www.microsoft.com/en-us/download/ie.aspx?q=internet+explorer'>upgrade your web browser</a> &mdash; <a href='https://strava.zendesk.com/entries/20420212-Supported-Browsers-on-Strava'>Learn more</a>.</p>
</div>
<![endif]-->
<nav class="nav-bar">
<div class="inner-content">
<div class="branding"><a href="/" class="strava-logo" title="Return to the Strava home page">Strava</a></div>
<ul class="user-nav">
<li class="logged_out_nav"><a href="/register?utm_source=login" class="button">Sign Up</a></li>
</ul>

</div>
</nav>


</header>

<div class="page">
<div class="pageContent">
<div class="message page-status-message" style="display:none;">Loading …</div>
<div class="registration-panel">
<h1 class="clearfix">
Log In
</h1>

<form accept-charset="UTF-8" action="/session" class="website" id="login_form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="o+KdX8Ft2Bv0iBYOpIJWyDNJ/p14HgOxTynun68dIZ4="></div>
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
<button class="btn-primary" id="login-button" type="submit">Log In</button>
<div class="reset-password"><a href="/account/recover">Forgot your password?</a></div>
</form>

</div>

<div class="clear"></div>
</div>
</div>
</body>
</html>
