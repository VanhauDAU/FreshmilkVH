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
    <title>Quản lý hãng sữa</title>
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
</head>

<body>
    <?php
        require_once("connect.php");
        $sql ="select * from manage_brand";
        $result = mysqli_query($conn,$sql);
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
                    <li class="active menu__navbar--link">
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
            <div class="header-top">
                <div class="header-top__content">
                    <i class="fa-solid fa-bars" onclick="hidden_menu()"></i>
                    <h1 class="title">Quản lý Hãng Sữa</h1>
                </div>
            </div>
            <div class="data_customer" id="content">
                <a href="./add_info_brand.php">Thêm mới</a>
                <div class="table-customer">
                    <table>
                        <tr>
                            <th>
                                STT
                            </th>
                            <th>
                                Mã HS
                            </th>
                            <th>
                                Tên Hãng Sữa
                            </th>
                            <th>
                                Địa Chỉ
                            </th>
                            <th>
                                Điện Thoại
                            </th>
                            <th>
                                Email
                            </th>
                            <th><i class="fa-solid fa-pen-to-square"></i></th>
                            <th><i class="fa-solid fa-user-xmark"></i></th>
                        </tr>
                        <?php
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                            <td>
                                <?php
                                    echo $row["STT"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["MaHS"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["TenHS"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["DiaChi"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["DienThoai"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["Email"];
                                ?>
                            </td>
                            <td>
                                <a href="./update_info_brand.php?MaHS=<?php echo $row['MaHS']; ?>">Cập nhật</a>
                            </td>
                            <td>
                                <a href="delete_brand.php?MaHS=<?php echo $row['MaHS']; ?>"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')"><i
                                        class="fa-solid fa-trash-can"></i></a>
                            </td>
                            </td>
                        </tr>
                        <?php
                    }
                    mysqli_close($conn);
                ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/index.js"></script>
</body>

</html>