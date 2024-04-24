<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: login_admin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt hệ thống</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/css_admin/admin.css">
    <style>
        
        body {
            color: #333;
        }
        .content {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #setting {
            font-weight: 600;
            font-size: 1.9rem;
            color: #0093E9;
            text-transform: uppercase;
            margin-top: 0;
            text-align: center;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="menu fixed">
            <div class="menu__account">
                <img src="../assets/images/img_account_admin.jpg" alt="logo" class="menu__account--img">
                <h2 class="menu__account--name">Admin</h2>
                <p class="menu__account--desc">Chào mừng bạn trở lại</p>
            </div>
            <div class="menu__navbar">
                <ul class="menu__navbar--list">
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-house"></i>
                        <a href="./dashboard.php">Dashboard</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-cow"></i>
                        <a href="./manage_brand.php">Quản lý hãng sữa</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-cow"></i>
                        <a href="./manage_milk.php">Quản lý sữa</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-person"></i>
                        <a href="./manage_customer.php">Quản lý khách hàng</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-user"></i>
                        <a href="./manage_staff.php">Quản lý nhân viên</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-list-check"></i>
                        <a href="./manage_order.php">Quản lý đơn đặt hàng</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-school-circle-check"></i>
                        <a href="./manage_calendar.php">Quản lý lịch làm việc</a>
                    </li>
                    
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-power-off"></i>
                        <a href="./manage_login.php">Quản lý đăng nhập</a>
                    </li>
                    <li class="active menu__navbar--link">
                        <i class="fa-solid fa-gear"></i>
                        <a href="./setting.php">Cài đặt hệ thống</a>
                    </li>
                </ul>
            </div>
            <div class="menu__signout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="#!">Đăng xuất</a>
            </div>
        </div>
        <div class="content">
        <h2 id="setting">CÀI ĐẶT HỆ THỐNG</h2>
        <form action="#">
            <div class="form-group">
                <label for="theme">Chọn Giao Diện:</label>
                <select name="theme" id="theme">
                    <option value="Sáng">Sáng</option>
                    <option value="Tối">Tối</option>
                </select>
            </div>
            <button class="btn" onclick="toggleTheme()">Lưu</button>
        </form>
        </div>
    </div>
    <script>
        const container = document.querySelector('.container');
        const content = document.querySelector('.content');
        function toggleTheme() {
            const theme = document.getElementById('theme').value;
            if (theme === 'Tối') {
                document.body.style.backgroundColor = '#333';
                container.style.backgroundColor = '#333';
                content.style.backgroundColor = '#333';
                document.body.style.color = '#fff';
            } else {
                document.body.style.backgroundColor = '#f4f4f4';
                document.body.style.color = '#333';
            }
        }
    </script>
</body>

</html>