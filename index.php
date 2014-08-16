<?php
    include('util.php');
    include('header.php');


    if (!validSession()) {
?>

<div class="jumbotron">
<h1>Welcome to CTFDASH</h1>
To use this sweet Piece of Software please <a href="/login.php" class="btn btn-primary">Login</a> or <a href="/login.php" class="btn btn-success">Register</a></br />
After Registration you can directly login.
</div>

<?php
} else {

        $db = mysqli_connect('localhost','ctfdash','ctfdash','ctfdash');
        $result = mysqli_query($db, "SELECT * FROM categories");

        while ($category = mysqli_fetch_assoc($result)) {
            ?><row>
                  <h1>
                      <?php echo(htmlspecialchars($category['name'])); ?>
                  <?php if(validAdminSession()) {?><small><a href="/category_remove.php?id=<?php echo($category['id']); ?>"><span class="glyphicon glyphicon-trash"></span></a></small><?php } ?></h1>
                  <a href="/challenge_create.php?category=<?php echo($category['id']); ?>">New Challenge</a>
                  <table>
                  <tr>
                  <th>Name</th>
                  <th>Link</th>
                  <th>Value</th>
                  <th>Working on</th>
                  </tr>
                  <?php
                    $challenge_result = mysqli_query($db, "SELECT * FROM challenges WHERE category=". $category['id']);
                      while ($challenge = mysqli_fetch_assoc($challenge_result)) {
                        ?>
                        <tr>
                        <td>echo($challenge['name']);</td>
                        <td>echo($challenge['link']);</td>
                        <td>echo($challenge['value']);</td>
                        <td>NYI</td>
                        </tr><?php
                    }
                    mysqli_free_result($challenge_result);
                  ?>
                  </table>
            </row><?php
        }
        mysqli_free_result($result);
        mysqli_close($db);



?>

<form action="category_create.php" method="POST" class="form-inline" role="form">
  <div class="form-group">
    <label for="name">New Category</label>
    <input type="text" class="form-control" name="name" placeholder="Category Name">
  </div>
  <button type="submit" class="btn btn-default">Create</button>
</form>

<?php
}
?>


<?php include('footer.php');?>
