<?php
    require('util.php');
    require('lib/password.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = mysqli_connect('localhost','ctfdash','ctfdash','ctfdash');
	$query = mysqli_prepare($db, "SELECT * FROM users WHERE username=?");
	mysqli_stmt_bind_param($query, "s", $username); 
        mysqli_stmt_execute($query);
        $result = Array();
        mysqli_stmt_bind_result($query, $result['id'], $result['username'], $result['hash'],$result['isAdmin']);
        mysqli_stmt_fetch($query);
        mysqli_stmt_close($query);
        mysqli_close($db);
       
        if($username == $result['username'] && password_verify($password, $result['hash'])) {
            $_SESSION["loggedin"] = true;
            $_SESSION['uid'] = $result['id'];
            $_SESSION['username']  = $result['username'];
            $_SESSION['isAdmin'] = $result['isAdmin'];
        }
    }
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
        require("header.php");
        ?>
<div class="row">
<div class="col-md-4 col-md-offset-2">
<h1>Login</h1>
<div class="well">
<form role="form" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>
<div class="col-md-4">
<h1>Register</h1>
<div class="well">        
<form role="form" action="/register.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password2">Repeat Password</label>
    <input type="password" class="form-control" name="password2" placeholder="Repeat Password">
  </div>
  <button type="submit" class="btn btn-success">Register</button>
</form>
</div>
</div>
</div>
        <?php
        require("footer.php");
    } else {
        header('Location: http://ctf.gnomus.de/');
    }
?>
