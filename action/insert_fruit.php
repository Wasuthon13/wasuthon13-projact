<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // รับค่าจากฟอร์ม และใช้ mysqli_real_escape_string ป้องกัน SQL Injection
    $product_id    = mysqli_real_escape_string($con,$_POST["product_id"]);
    $product_name  = mysqli_real_escape_string($con,$_POST["product_name"]);
    $price         = mysqli_real_escape_string($con,$_POST["price"]);
    $product_cover = mysqli_real_escape_string($con,$_POST["product_cover"]);
    $category_id   = mysqli_real_escape_string($con,$_POST["category_id"]);

    $sql = "INSERT INTO `products`
            (`product_id`, `product_name`, `price`, `product_cover`, `category_id`)
            VALUES 
            ('$product_id', '$product_name', '$price', '$product_cover', '$category_id')";

    try {
        $result = mysqli_query($con,$sql);
        
        if ($result) {
            header("location: ../index.php");
            exit;
        }
    } catch (mysqli_sql_exception $e) {
        // ดักจับกรณีใส่ product_id ซ้ำในระบบ
        if ($e->getCode() == 1062) {
            echo "<script>
                    alert('ไม่สามารถเพิ่มข้อมูลได้! เนื่องจากรหัสผลไม้ ($product_id) มีในระบบแล้ว');
                    window.history.back();
                  </script>";
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $e->getMessage();
        }
    }

} else {
    header("location: ../index.php");
    exit;
}
?>