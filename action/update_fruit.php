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
    
$sql = "UPDATE `products`
 SET 
 `product_name`=' $product_name',
 `product_price`='$price',
 `product_cover`='$product_cover',
 `category`='$category'
  WHERE product_id= '$product_id'
  ";
    
$result = mysqli_query($con,$sql);

if(!$result){
    echo "error";
}else{
    header("location: ../manage_fruit.php");
    exit;
}