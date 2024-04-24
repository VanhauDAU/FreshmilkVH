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
    <style>
        .content.manage_customer.contact {
            width: 100%;
            margin-left: 0;
        }

        #NoiDung {
            text-align: start;
            width: 400px;
            max-width: 400px;
        }
    </style>
</head>

<body>

    <?php
        require_once("connect.php");
        $sql ="select * from user_contact";
        $result = mysqli_query($conn,$sql);
    ?>
    <div class="container">
        <div class="content manage_customer contact" id="content">
            <div class="header-top">
                <div class="header-top__content">
                    <i class="fa-solid fa-bars" onclick="hidden_menu()"></i>
                    <h1 class="title">Quản lý Liên Hệ</h1>
                </div>
            </div>
            <div class="data_customer" id="content">
                <a href="./admin.php">Quay lại</a>
                <div class="table-customer">
                    <table>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Tên Khách Hàng
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Điện Thoại
                            </th>
                            <th>
                                Nội Dung
                            </th>
                            <th><i class="fa-solid fa-user-xmark"></i></th>
                        </tr>
                        <?php
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                            <td>
                                <?php
                                    echo $row["ID"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["HoTen"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["Email"];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $row["DienThoai"];
                                ?>
                            </td>
                            <td id="NoiDung">
                                <?php
                                    echo $row["NoiDung"];
                                ?>
                            </td>
                            <td>
                                <a href="delete_user_contact.php?ID=<?php echo $row['ID']; ?>"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')"><i
                                        class="fa-solid fa-trash-can"></i></a>
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