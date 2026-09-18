<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product_id    = mysqli_real_escape_string($con, $_POST['product_id']);
    $product_name  = mysqli_real_escape_string($con, $_POST['product_name']);
    $price         = mysqli_real_escape_string($con, $_POST['price']);
    $product_cover = mysqli_real_escape_string($con, $_POST['product_cover']);
    $category_id   = mysqli_real_escape_string($con, $_POST['category_id']);

    $sql = "UPDATE products SET 
                product_name = '$product_name',
                price = '$price', 
                product_cover = '$product_cover',
                category_id = '$category_id'
            WHERE product_id = '$product_id'";

    try {
        $result = mysqli_query($con, $sql);

        if ($result) {
            header("Location: ../index.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // ดักจับ Error รหัสซ้ำ (Code 1062)
        if ($e->getCode() == 1062) {
            echo "<script>
                    alert('ไม่สามารถบันทึกได้! เนื่องจากคอลัมน์ category_id ในฐานข้อมูลถูกตั้งค่าห้ามซ้ำเอาไว้ โปรดแก้ไข Index ใน phpMyAdmin');
                    window.history.back();
                  </script>";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปเดต: " . $e->getMessage();
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}
?>