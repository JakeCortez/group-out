<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Group Out</title>
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
    <?php require_once('../php/nav.html');?>

    <div class="container-fluid">

      <!-- Article Area -->
      <article class="col-lg-8">
        <!-- User Profile Information -->
        <div class="userAvatar"></div>
        <div class="userDisplayName">Display Name</div>
        <div class="userActivities">biker | runner</div>
        <div class="userAboutMe">
          <h1>About Me</h1>
          <p>Praesent accumsan lacus massa, sed aliquam lorem dapibus vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed a gravida leo, vel blandit dolor. Praesent vulputate purus justo, sed ornare tortor aliquet id. Vivamus commodo fringilla nisl non eleifend.</p>
        </div>
        <div class="userLinks">my website / facebook / twitter / instagram</div>

        <!-- Lists of routes, events and groups-->
        <div class="bar">Events</div>
        <?php require_once('../php/list-create-oo.php');?>
      </article>

      <!-- Aside (sidebar) Area -->
      <aside class="col-lg-4">
        <?php require_once('../php/sidebarplaceholder.html');?>
      </aside>

    </div>

    <!-- footer called from php folder -->
    <?php require_once('../php/footer.html');?>
  </body>
</html>
