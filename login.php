<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - ร้านผลไม้</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f8f3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 360px;
            border-top: 6px solid #2e7d32;
        }

        .form-title {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 24px;
            font-size: 1.5rem;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #4a5568;
            font-size: 0.9rem;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 20px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.2s;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #2e7d32;
            background-color: #fafdfa;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #f57c00;
        }
    </style>
</head>
<body>

    <form action="check_login.php" method="post">
        <h2 class="form-title">เข้าสู่ระบบ</h2>
        
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required autocomplete="off">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn-primary">Login</button>
    </form>
    
</body>
</html>