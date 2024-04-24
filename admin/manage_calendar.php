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
    <title>Quản lý lịch làm việc</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/css_admin/admin.css">
    <style>
    .content{
        padding-top:20px ;
        background:rbga(0, 0,0,0.2);
    }
    .content > h1 {
        font-size: 2rem;
        text-transform: uppercase;
        font-weight: 600;
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
        background:white;
    }
    th {
        background-color: #fef9c3;
    }
    .add-session-btn {
        display: block;
        width: 250px;
        margin: 20px auto;
        padding: 10px 15px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;

    }
    .add-session-btn:hover {
        background-color: #45a049;
    }
    .action-btns {
        display: flex;
        justify-content: center;
    }
    .action-btns a {
        display: inline-block;
        margin: 0 5px;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }
    .action-btns a:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <?php
        require_once("connect.php");
        $sql = "SELECT manage_calendar.ID, manage_calendar.MaNV, manage_calendar.NgayPhien, manage_calendar.TGBatDau, manage_calendar.TGKetThuc,manage_calendar.NoiDung, manage_staff.TenNV 
            FROM manage_calendar 
            INNER JOIN manage_staff ON manage_calendar.MaNV = manage_staff.MaNV";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="container">
        <div class="menu fixed" id="menu">
            <div class="menu__account">
                <img src="../assets/images/img_account_admin.jpg" alt="logo" class="menu__account--img">
                <h2 class="menu__account--name">Admin</h2>
                <p class="menu__account--desc">Chào mừng bạn trở lại</p>
            </div>
            <div class="menu__navbar">
                <ul class="menu__navbar--list">
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-house"></i>
                        <a href="./admin.php">Trang Chủ</a>
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
                    <li class="active menu__navbar--link">
                        <i class="fa-solid fa-school-circle-check"></i>
                        <a href="./manage_calendar.php">Quản lý lịch làm việc</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-power-off"></i>
                        <a href="./manage_login.php">Quản lý đăng nhập</a>
                    </li>
                    <li class="menu__navbar--link">
                        <i class="fa-solid fa-gear"></i>
                        <a href="./setting.php">Cài đặt hệ thống</a>
                    </li>
                </ul>
            </div>
            <div class="menu__signout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="./login_admin.php">Đăng xuất</a>
            </div>
        </div>
        <div class="content manage_customer" id="content">
        <i class="fa-solid fa-bars" onclick="hidden_menu()"></i>
            <h1>Quản lý lịch làm việc của nhân viên</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã Nhân Viên</th>
                        <th>Tên Nhân Viên</th>
                        <th>Ngày</th>
                        <th>Bắt Đầu</th>
                        <th>Kết Thúc</th>
                        <th>Nội dung công việc</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dữ liệu được tạo động từ cơ sở dữ liệu -->
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['ID']?></td>
                        <td><?php echo $row['MaNV']?></td>
                        <td><?php echo $row['TenNV']?></td>
                        <td class="dmy"><?php echo $row['NgayPhien']?></td>
                        <td><?php echo $row['TGBatDau']?></td>
                        <td><?php echo $row['TGKetThuc']?></td>
                        <td><?php echo $row['NoiDung']?></td>
                        <td class="action-btns">
                            <a href="./update_info_calendar.php?ID=<?php echo $row['ID']?>"><i class="fas fa-edit"></i> Chỉnh sửa</a>
                            <a href="./delete_calendar.php?ID=<?php echo $row['ID']?>"><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php
                        }
                        mysqli_close($conn);
                    ?>
                    <!-- Thêm các hàng tương tự cho các phiên làm việc khác -->
                </tbody>
    </table>
    <a href="./add_info_calendar.php" class="add-session-btn"><i class="fas fa-plus-circle"></i> Thêm lịch làm việc</a>
        </div>
    </div>
    <script src="../js/index.js"></script>
    <script>
        // Lặp qua tất cả các cột chứa ngày tháng để chuyển định dạng
        document.querySelectorAll('.dmy').forEach(function (element) {
            // Lấy ngày tháng năm từ văn bản của cột
            var dateString = element.textContent;
            // Chuyển đổi ngày tháng năm thành đối tượng Date
            var date = new Date(dateString);
            // Lấy các giá trị ngày, tháng, năm
            var day = date.getDate();
            var month = date.getMonth() + 1; // Tháng bắt đầu từ 0 nên cần +1
            var year = date.getFullYear();
            // Tạo chuỗi ngày tháng năm mới
            var formattedDate = day + '/' + month + '/' + year;
            // Gán lại văn bản của cột với định dạng mới
            element.textContent = formattedDate;
        });
    </script>
</body>

</html>