<?php

error_reporting(E_ALL);

        // Force errors to be displayed on the screen
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_cover = $_POST["product_cover"];
$category = $_POST["category"];

include 'connect.php';
    
$sql = "INSERT INTO `products`
        (`product_id`, `product_name`, `product_price`, `product_cover`, `category`)
        VALUES 
        ('$product_id','$product_name','$product_price','$product_cover','$category')";
    
$result = mysqli_query($con,$sql);

if(!$result){
    echo "error";
}else{
    header("location: ../index.php");
    exit;
}