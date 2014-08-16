<?php
    require('util.php');
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && validAdminSession()) {

        $category = $_GET['category'];
        ?>
        <form method="POST" class="form-inline" role="form">
            <div class="form-group">
                <label for="name">New Callenge</label>
                <input type="text" class="form-control" name="name" placeholder="Challenge Name">
            </div>
            <div class="form-group">
                <label for="link">Challenge Hyperlink</label>
                <input type="text" class="form-control" name="link" placeholder="Challenge Link">
            </div>
            <div class="form-group">
                <label for="value">Challenge Value</label>
                <input type="text" class="form-control" name="value" placeholder="Challenge Value">
            </div>
            <input type="hidden" name="category" value="<?php echo($category) ?>">
            <button type="submit" class="btn btn-default">Create</button>
        </form>
        <?php
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && validAdminSession()) {

        $name = $_POST['name'];
        $link = $_POST['link'];
        $value = $_POST['value'];
        $category = $_POST['category'];

        $db = mysqli_connect('localhost','ctfdash','ctfdash','ctfdash');
        $query = mysqli_prepare($db, 'INSERT INTO challenges (name,link,value,category) VALUES (?,?,?,?)');
        mysqli_stmt_bind_param($query, 'ssii', $name,$link,$value,$category);
        mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        mysqli_close($db);
        header('Location: http://ctf.gnomus.de/');

    }


?>
