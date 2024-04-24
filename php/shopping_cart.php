<?php
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if(isset($_SESSION['username'])) {
        $welcome_message = "Xin chào, " . $_SESSION['username'];
        $login_logout_link = '<a href="./php/login.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></a>';
    } else {
        $welcome_message = '<a href="./login.php" class="btn__signin">Đăng Nhập</a>';
        $login_logout_link = '';
    }
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
    //xóa hết sản phẩm trong giỏ hàng
    if(isset($_GET['delcart']) && ($_GET['delcart']==1)) unset($_SESSION['giohang']);
    //xóa 1 sản phẩm trong giỏ hàng
    if(isset($_GET['delid']) && ($_GET['delid']>=0)){
        array_splice($_SESSION['giohang'],$_GET['delid'],1);
    }
    //lấy dữ liệu từ form
    if(isset($_POST['addcart']) && ($_POST['addcart'])){
        $hinh = $_POST['hinh'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];
        //kiểm tra sản phẩm có trùng trong giỏ hàng hay không
        $fl=0;
        for($i = 0;$i < sizeof($_SESSION['giohang']); $i++){
            if($_SESSION['giohang'][$i][1]==$tensp){
                $fl=1;
                $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3] = $soluongnew;
                break;

            }
        }
        //Nếu không trùng sản phẩm thì thêm mới 
        if($fl == 0){
            //thêm mới sản phẩm vào giỏ hàng
            $sp=[$hinh,$tensp,$gia,$soluong];
            $_SESSION['giohang'][] = $sp;
            // var_dump($_SESSION['giohang']);
        }
    }
    function showgiohang(){
        if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){
            $tong = 0;
            $tiente = "đ";
            for($i = 0; $i < sizeof($_SESSION['giohang']); $i++){
                $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tong+=$tt;
                echo '<tr>
                            <td>
                                <input type="checkbox" class="chonsp">
                            </td>
                            <td>
                                <div class="product-name">
                                    <img src="../assets/images/'.$_SESSION['giohang'][$i][0].'" alt="" class="img-product">
                                    <h3 class="name-product">'.$_SESSION['giohang'][$i][1].'</h3>
                                </div>
                            </td>
                            <td>
                                <strong>'.$_SESSION['giohang'][$i][2].'</strong>
                            </td>
                            <td>
                                <input type="number" min="1" value="'.$_SESSION['giohang'][$i][3].'">
                            </td>
                            <td>
                                <strong>'.$tt.''.$tiente.'</strong>
                            </td>
                            <td>
                                <a href="shopping_cart.php?delid='.$i.'">
                                        Xóa
                                </a>
                            </td>
                        </tr>';
            }
        }
    }
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- reset css -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <!-- icon font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/shopping_cart.css">
    <link rel="stylesheet" href="../assets/css/rps_index.css">
</head>

<body>
    <header class="header fixed">
        <div class="main-content">
            <div class="body header-shopping">
                <div class="logo__title">
                    <a href="../index.php"><img src="../assets/images/logo.png" alt="" class="logo"></a>
                    <h2 class="title">Giỏ hàng</h2>
                </div>
                <div class="find_product">
                    <form autocomplete="off">
                        <input type="text" placeholder="Tìm kiếm sản phẩm trong giỏ hàng" name="find_product">
                        <button type="submit"> <i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="account">
                    <a href="../admin/admin.php"><img src="../assets/images/img_account_admin.jpg" alt=""></a>
                    <?php
                        
                            if(isset($welcome_message) && ($welcome_message!="")){
                                echo "<font color='black'>".$welcome_message."</font>";
                                echo "$login_logout_link";
                            }
                        ?>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="main-contentt cart">
                <div class="info_address">
                    <h2>Thông Tin Nhận Hàng</h2>
                    <div class="form-info-address">
                        <table class="thongtinnhanhang">
                            <tr>
                                <td>
                                    <label for="HoTen">
                                        Họ Tên
                                    </label>

                                </td>
                                <td>
                                    <input type="text" name="HoTen" id="HoTen" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="DiaChi">Địa Chỉ</label>
                                </td>
                                <td><input type="text" name="DiaChi" id="DiaChi" required></td>
                            </tr>
                            <tr>
                                <td><label for="DienThoai">Điện Thoại</label></td>
                                <td><input type="tel" name="DienThoai" id="DienThoai" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="Email">Email</label>
                                </td>
                                <td>
                                    <input type="email" name="Email" id="Email" required>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="body content-cart">
                    <table class="table-heading">
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Đơn giá</td>
                            <td>Số lượng</td>
                            <td>Thành tiền</td>
                            <td>Thao tác</td>
                        </tr>
                    </table>
                    <div class="table-product">
                        <table>
                            <?php showgiohang();?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="main-content">
            <div class="body footer-cart">
                <ul>
                    <li>
                        <input type="checkbox" onclick="selectAll()" id="selectAll">
                        <label for="selectAll">Chọn tất cả</label>
                    </li>
                    <li>
                        <a href="shopping_cart.php?delcart=1"><button">Xóa</button></a>
                    </li>
                    <li>
                        <a href="./all_product.php"><button>Tiếp tục đặt hàng</button></a>
                    </li>
                </ul>
                <div class="btn-buy">
                    <button>Mua Hàng</button>
                </div>
            </div>

        </div>
    </footer>
    <script>
        // Chọn tất cả
        var chk = document.querySelectorAll('input[type="checkbox"]');
        var selectAllCheckbox = document.getElementById('selectAll');
        function selectAll() {
            for (var i = 0; i < chk.length; i++) {
                chk[i].checked = selectAllCheckbox.checked;
            }
        }
    </script>
</body>

    </html>