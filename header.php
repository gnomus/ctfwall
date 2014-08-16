<?php if(!function_exists('validSession')) include('util.php'); ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CTFDASH v0.1-veryAlpha</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">CTFDASH v0.1-veryAlpha</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse">
        <?php
            if(validSession()) {

?>
<form class="navbar-form navbar-right" role="search" action="logout.php">
         <button type="submit" class="btn btn-danger">
            Logout
         </button>
      </form> 
      <p class="navbar-text navbar-right">Hello <a href="profile.php"><?php echo($_SESSION['username']); ?></a>!<?php if (validAdminSession()) echo(' | <a href="/admin.php">Backend</a>'); ?></p>
<?php
            } else {
		?><a class="btn btn-default navbar-btn navbar-right" href="/login.php">Login/Register</a></li><?php
            }
        ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


  <div class="container">
