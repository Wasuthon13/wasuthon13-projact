<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$id = $_GET['id'];

include 'connect.php';
    
$sql = "DELETE FROM products WHERE product_id = '$id' ";
    
$result = mysqli_query($con,$sql);

if(!$result){
    echo "error";
}else{
    header("location: ../manage_fruit.php");
    exit;
}