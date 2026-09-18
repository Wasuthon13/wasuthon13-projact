<?php
       
$con = mysqli_connect("localhost","root","","bit25_w4_db");
//รับค่า
$username = $_POST["username"];
$password = $_POST["password"];

session_start();

$q = "SELECT * FROM users
        WHERE username = '$username'
        AND password = '$password' 
        ";


$result = mysqli_query($con,$q);

$user = mysqli_fetch_assoc($result);

if( mysqli_num_rows($result) > 0 ){

    $_SESSION['fname'] = $user['fname'];
    header("location: index.php");
    exit;

}else{

    header("location: login.php");
    exit;
}