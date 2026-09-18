<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลผลไม้ - Fruit Store</title>
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

        .navbar-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
        }

        .navbar-brand {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2e7d32;
            text-decoration: none;
        }

        .navbar-nav {
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

        .nav-link:hover, .nav-link.active {
            background-color: #e8f5e9;
            color: #2e7d32;
            font-weight: 600;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .form-card {
            background-color: #ffffff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 500px;
            border-top: 6px solid #2e7d32;
        }

        .form-title {
            color: #2e7d32;
            margin-bottom: 20px;
            font-size: 1.4rem;
            font-weight: 600;
            text-align: center;
            border-bottom: 2px solid #e8f5e9;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #4a5568;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #2e7d32;
            background-color: #fafdfa;
        }

        .btn-submit {
            width: 100%;
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #1b5e20;
        }

        /* Footer */
        .footer {
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .footer-links a {
            text-decoration: none;
            color: #718096;
            font-size: 0.85rem;
        }

        .footer-links a:hover {
            color: #2e7d32;
        }

        .footer-copy {
            color: #a0aec0;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include 'action/connect.php';

    // ดึงข้อมูลประเภทผลไม้ทั้งหมด (หมายเหตุ: ตรวจสอบชื่อตารางประเภทของคุณ เช่น categories)
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);
?>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-brand">Fruit Store</a>
            <ul class="navbar-nav">
                <li><a href="index.php" class="nav-link">แสดงข้อมูล</a></li>
                <li><a href="manage_fruit.php" class="nav-link">จัดการข้อมูล</a></li>
                <li><a href="add_fruit.php" class="nav-link active">เพิ่มผลไม้</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="form-card">
            <h2 class="form-title">เพิ่มข้อมูลผลไม้ใหม่</h2>

            <form action="action/insert_fruit.php" method="post">

                <div class="form-group">
                    <label for="product_id">รหัสผลไม้</label>
                    <input type="text" id="product_id" name="product_id" class="form-control" placeholder="เช่น F001" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="product_name">ชื่อผลไม้</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="กรอกชื่อผลไม้" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="price">ราคาผลไม้ (บาท)</label>
                    <input type="number" step="0.01" id="price" name="price" class="form-control" placeholder="เช่น 45.00" required>
                </div>

                <div class="form-group">
                    <label for="product_cover">ลิงก์ภาพปก (URL)</label>
                    <input type="url" id="product_cover" name="product_cover" class="form-control" placeholder="https://example.com/image.jpg" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="category_id">ประเภทผลไม้</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">-- เลือกประเภทผลไม้ --</option>
                        <?php if($result): ?>
                            <?php foreach($result as $category): ?>
                                <option value="<?= htmlspecialchars(trim($category["category_id"])) ?>">
                                    <?= htmlspecialchars($category["category_name"] ?? $category["category_id"]) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <button type="submit" class="btn-submit">บันทึกข้อมูล</button>

            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <ul class="footer-links">
                <li><a href="index.php">แสดงข้อมูล</a></li>
                <li><a href="manage_fruit.php">จัดการข้อมูล</a></li>
                <li><a href="add_fruit.php">เพิ่มผลไม้</a></li>
            </ul>
            <p class="footer-copy">&copy; <?= date('Y') ?> Fruit Store. All Rights Reserved.</p>
        </div>
    </footer>
    
</body>
</html>