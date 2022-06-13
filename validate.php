<?php
session_start();

$host_db = "localhost:3307";
$user_db = "root";
$pass_db = "";
$db_name = "student_info";
$tbl_name = "stud_info";

$connection = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($connection->connect_error) {
 die("Connection failed: " . $connection->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE username = '$username'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
 $row = $result->fetch_assoc();
 if ($password==$row['password']) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60); //time for expiring session

    echo "Welcome! " . $_SESSION['username'];
 }
 } else {
    echo "Your Login Name or Password is invalid";
 }
 mysqli_close($connection);
 ?>
