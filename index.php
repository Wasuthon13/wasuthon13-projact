<?php
session_start();

if (!isset($_SESSION["fname"])) {
    header("location: login.php");
    exit;
}

// Report all PHP errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'action/connect.php';

$sql = "SELECT * FROM products";
$resul = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการผลไม้ทั้งหมด - Fruit Store</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f8f3;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Header */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-bottom: 4px solid #2e7d32;
            padding: 0 5%;
        }

        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
        }

        .brand-logo {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2e7d32;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 15px;
        }

        .nav-link {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .nav-link.btn-logout {
            background-color: #ff9800;
            color: white;
        }

        .nav-link.btn-logout:hover {
            background-color: #f57c00;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            max-width: 1100px;
            width: 90%;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .page-title {
            color: #2e7d32;
            margin-bottom: 24px;
            font-size: 1.5rem;
            font-weight: 600;
            border-bottom: 2px solid #e8f5e9;
            padding-bottom: 12px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            overflow: hidden;
            border-radius: 8px;
        }

        thead tr {
            background-color: #2e7d32;
            color: #ffffff;
            text-align: left;
            font-weight: 600;
        }

        th, td {
            padding: 14px 16px;
            vertical-align: middle;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: background-color 0.2s;
        }

        tbody tr:hover {
            background-color: #fafdfa;
        }

        tbody tr:last-of-type {
            border-bottom: 2px solid #2e7d32;
        }

        .fruit-img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .badge-category {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        /* Footer */
        .footer {
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        .footer-copy {
            color: #718096;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <header class="navbar">
        <div class="nav-container">
            <div class="brand-logo"> Fruit Store</div>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link">แสดงข้อมูล</a></li>
                <li><a href="manage_fruit.php" class="nav-link">จัดการข้อมูล</a></li>
                <li><a href="add_fruit.php" class="nav-link active">เพิ่มผลไม้</a></li>
            </ul>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="main-content">
        <h2 class="page-title">รายการผลไม้ทั้งหมด</h2>

        <table>
            <thead>
                <tr>
                    <th>รหัสผลไม้</th>
                    <th>ภาพประกอบ</th>
                    <th>ชื่อผลไม้</th>
                    <th>ราคา</th>
                    <th>ประเภท</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resul as $fruit): ?>
                <tr>
                    <td><?= htmlspecialchars($fruit["product_id"]) ?></td>
                    <td>
                        <img 
                            src="<?= htmlspecialchars($fruit["product_cover"]) ?>" 
                            alt="<?= htmlspecialchars($fruit["product_name"]) ?>"
                            class="fruit-img"
                        >
                    </td>
                    <td><strong><?= htmlspecialchars($fruit["product_name"]) ?></strong></td>
                    <td style="color: #d97706; font-weight: 600;"><?= number_format($fruit["price"], 2) ?> บาท</td>
                    <td><span class="badge-category"><?= htmlspecialchars($fruit["category_id"]) ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <p class="footer-copy">&copy; <?= date('Y') ?> Fruit Store. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>