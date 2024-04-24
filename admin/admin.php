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
    <title>Trang quản lý cửa hàng</title>
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
    // Kết nối đến cơ sở dữ liệu
    require_once("connect.php");

    // Truy vấn để đếm số lượng bản ghi trong bảng user_contact
    $sql_contact = "SELECT COUNT(*) AS user_contact_count FROM user_contact";
    $result_contact = mysqli_query($conn, $sql_contact);
    
    // Kiểm tra nếu truy vấn thành công
    if($result_contact) {
        // Lấy kết quả trả về dưới dạng một mảng kết hợp (associative array)
        $row_contact = mysqli_fetch_assoc($result_contact);
        
        // Lấy giá trị số lượng bản ghi từ mảng kết hợp
        $user_contact_count = $row_contact['user_contact_count'];
    }
    $sql_phongban = "SELECT COUNT(*) AS phongban_count FROM phongban";
    $result_phongban = mysqli_query($conn, $sql_phongban);
    
    // Kiểm tra nếu truy vấn thành công
    if($result_phongban) {
        // Lấy kết quả trả về dưới dạng một mảng kết hợp (associative array)
        $row_phongban = mysqli_fetch_assoc($result_phongban);
        
        // Lấy giá trị số lượng phòng ban từ mảng kết hợp
        $phongban_count = $row_phongban['phongban_count'];
    }
    // Đóng kết nối
    mysqli_close($conn);
?>

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
        <div class="content trangchu">
            <div class="body-trangchu">
                <div class="notifi">
                    <a href="#!"><i class="fa-solid fa-bell"></i></a>
                </div>
                <div class="dieuhuong-trangchu">
                    <a href="./admin.php"><i class="fa-solid fa-house-user"></i></a>
                    <span>/</span>
                    <h3>Trang chủ</h3>
                </div>
                <h1>Trang Chủ</h1>
                <div class="list-ganeralData">
                    <a href="#!">
                        <div class="data-item">
                            <i class="cart-icon fa-solid fa-cart-plus"></i>
                            <strong>58</strong>
                            <h3>Đơn hàng mới</h3>
                        </div>
                    </a>
                    <a href="#!">
                        <div class="data-item">
                            <i class="user-icon fa-solid fa-user-plus"></i>
                            <strong>34</strong>
                            <h3>Người dùng mới</h3>
                        </div>
                    </a>
                    <a href="./phongban.php">
                        <div class="data-item">
                            <i class="cmt-icon fa-solid fa-comment"></i>
                            <strong><?php echo $row_phongban['phongban_count'] ?></strong>
                            <h3>Phòng ban</h3>
                        </div>
                    </a>
                    <a href="./user_contact.php">
                        <div class="data-item">
                            <i class="find-icon fa-solid fa-magnifying-glass"></i>
                            <strong><?php echo $row_contact['user_contact_count']?></strong>
                            <h3>KH Liên Hệ</h3>
                        </div>
                    </a>
                </div>
                <div class="data-chart">
                    <div class="pie-chart-milk">
                        <div id="piechart"></div>
                    </div>
                    <div class="pie-chart-milk2">
                        <img src="../assets/images/bieudo.png" alt="">
                    </div>
                </div>
                <div class="timereal">
                    <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        echo date("h:i:sa") . "<br>";
                        echo date("d/m/Y");
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);
        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Sữa chua', 20],
                ['Sữa hộp pha sẵn', 40],
                ['Sữa bột', 15],
                ['Sữa non', 20],
                ['Sữa đặc', 7],
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = { 'title': 'Sản phẩm bán chạy nhất theo loại sữa', 'width': 440, 'height': 270 };
            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>