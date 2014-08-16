<?php 
require('lib/password.php');
$db = mysqli_connect('localhost','ctfdash','ctfdash','ctfdash');

//USER TABLE
mysqli_query($db, 'DROP TABLE users');
mysqli_query($db, 'CREATE TABLE users (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, username VARCHAR(100) NOT NULL, password VARCHAR(60) NOT NULL, isAdmin BOOLEAN)');

//DEFAULT ADMIN USER
$query = mysqli_prepare($db, "INSERT INTO users (username,password,isAdmin) VALUES (?,?,?)");
$username = "admin";
$hash = password_hash("admin", PASSWORD_BCRYPT);
$isAdmin = true;
mysqli_stmt_bind_param($query, "ssi", $username, $hash, $isAdmin); 
mysqli_stmt_execute($query);
mysqli_stmt_close($query);

//CATEGORY TABLE
mysqli_query($db, 'DROP TABLE categories');
mysqli_query($db, 'CREATE TABLE categories (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(100) NOT NULL)');

//CHALLENGE TABLE
mysqli_query($db, 'DROP TABLE challenges');
mysqli_query($db, 'CREATE TABLE challenges (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(100) NOT NULL, link VARCHAR(100) NOT NULL, value INT NOT NULL, category INT NOT NULL)');

mysqli_close($db);

echo("Done!");
?>
