<?php
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if(isset($_SESSION['username'])) {
        $welcome_message = "Xin chào, " . $_SESSION['username'];
        $login_logout_link = '<a href="./logout.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></a>';
    } else {
        $welcome_message = '<a href="./login.php" class="btn__signin">Đăng Nhập</a>';
        $login_logout_link = '';
    }
    $soluongsanphamgiohang = isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sự kiện và Tin Tức</title>
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
    <link rel="stylesheet" href="../assets/css/rps_index.css">
</head>

<body>
    <header class="header fixed">
        <div class="main-content">
            <div class="body">
                <a href="../index.php"><img src="../assets/images/logo.png" alt="" class="logo"></a>
                <div class="navbar">
                    <ul class="navbar__list">
                        <li>
                            <a href="../index.php">Trang Chủ</a>
                        </li>
                        <li>
                            <a href="./info_brand.php">Thương Hiệu</a>
                            <div class="submenu brand">
                                <ul>
                                    <li>
                                        <a href="https://www.vinamilk.com.vn/vi">vinamilk</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <div class="submenu__brand">
                                            <img src="../assets/images/brand_vinamilk.png" alt="" class="submenu__logo">
                                            <h2 class="slogan">Vinamilk "Vươn cao Việt Nam"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Top 1 Việt Nam</strong>
                                            <p class="desc">
                                                Vinamilk là công ty sữa hàng đầu tại Việt Nam, thành lập từ năm 1976,
                                                nổi tiếng với các sản phẩm sữa chất lượng cao và hiện diện mạnh mẽ trên
                                                thị trường quốc tế.</p>
                                            <div class="submenu__brand--icon">
                                            </div>
                                        </div>

                                    </li>
                                    <li>
                                        <a href="https://www.thmilk.vn/">TH - true milk</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <!-- TH true milk -->
                                        <div class="submenu__brand">
                                            <img src="../assets/images/brand_TH.png" alt="" class="submenu__logo">
                                            <h2 class="slogan">Hạnh phúc đích thực – True Happiness"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Kinh doanh xuất sắc 2022-2023</strong>
                                            <p class="desc">
                                                Với quy trình sản xuất hiện đại và sự kiểm soát chất lượng nghiêm ngặt
                                                từ quy trình chăm sóc gia súc đến quy trình đóng gói, TH True Milk mang
                                                lại cho khách hàng sự tin cậy và niềm tin trong mỗi lần sử dụng sản phẩm
                                                của mình</p>
                                            <div class="submenu__brand--icon">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="https://www.mcmilk.com.vn/">Mộc Châu Milk</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <!-- Mộc chây -->
                                        <div class="submenu__brand">
                                            <img src="../assets/images/brand_mochau.png" alt="" class="submenu__logo">
                                            <h2 class="slogan">Thảo nguyên xanh – Sữa mát lành"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Top 500 doanh nghiệp lớn Việt Nam</strong>
                                            <p class="desc">
                                                Thành lập năm 1958, Công ty Cổ phần Giống bò sữa Mộc Châu (Mộc Châu
                                                Milk) là đơn vị đầu tiên chăn nuôi bò sữa và chế biến sữa tại Việt Nam.
                                                Sự tươi mới của sữa tự nhiên từ vùng cao Mộc Châu, Việt Nam.
                                            </p>
                                            <div class="submenu__brand--icon">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="https://nutifood.com.vn/">NutiFood</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <!-- Nutifood -->
                                        <div class="submenu__brand">
                                            <img src="../assets/images/brand_nutri.png" alt=""
                                                class="submenu__logo nuti">
                                            <h2 class="slogan">Giải pháp dinh dưỡng của chuyên gia"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Top 1 Việt Nam</strong>
                                            <p class="desc">
                                                Với cam kết đem lại sức khỏe và cân bằng dinh dưỡng cho người tiêu dùng,
                                                Nutifood sử dụng công nghệ tiên tiến và nguồn nguyên liệu tự nhiên để
                                                tạo ra các sản phẩm an toàn và hiệu quả.</p>
                                            <div class="submenu__brand--icon">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="submenu__arow-up">
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="./all_product.php">Sản phẩm</a>
                            <div class="submenu">
                                <ul>
                                    <li>
                                        <a href="./all_product.php">Tất cả sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="">Sữa bột</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <div class="sub__submenu">
                                            <ul>
                                                <li>
                                                    <a href="#!">Sữa NutiFood</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Meta Care</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Meiji</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Bột Abbott</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Nepro</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa bột Mộc Châu</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="">Sữa hộp</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <div class="sub__submenu">
                                            <ul>
                                                <li>
                                                    <a href="#!">Sữa NutiFood</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Meta Care</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Meiji</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Bột Abbott</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa Nepro</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa bột Mộc Châu</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="">Sữa chua</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                    </li>
                                    <li>
                                        <a href="">Sữa non</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <div class="sub__submenu">
                                            <ul>
                                                <li>
                                                    <a href="#!">Sữa non Alpha Lipid Lifeline</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa non Colosbaby</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa non Colostrum</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa non Mama Colos</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa non ColosCare</a>
                                                </li>
                                                <li>
                                                    <a href="#!">Sữa non TH</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="">Sữa tươi tiệt trùng</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                    </li>
                                </ul>
                                <div class="submenu__arow-up">
                                </div>
                            </div>
                        </li>
                        <li class="active">
                            <a href="#!">Tin Tức</a>
                        </li>
                        <li>
                            <a href="./contact.php">Liên Hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="header__action">
                    <div class="cart">
                        <a href="./shopping_cart.php">
                            <h2 class="cart__title">Giỏ hàng</h2>
                            <i class="cart__icon fa-solid fa-cart-shopping"></i>
                            <div class="count-product">
                            <?php echo $soluongsanphamgiohang ?>
                        </div>
                        </a>
                    </div>
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
    <div class="container-news">
        <div class="main-content news">
            <div class="body-news">
                <div class="text-heading">
                    Tin tức <br>
                    <span>& sự kiện</span>
                </div>
                <div class="find-news">
                    <div class="select-year">
                        <h3>Các tin đã đưa năm</h3>
                        <div class="year">
                            <select name="" id="">
                                <option value="">Tất cả</option>
                                <option value="">2024</option>
                                <option value="">2023</option>
                                <option value="">2022</option>
                                <option value="">2021</option>
                                <option value="">2020</option>
                                <option value="">2019</option>
                                <option value="">2018</option>
                                <option value="">2017</option>
                            </select>
                        </div>
                        <div class="btn-xem">
                            <button>Xem</button>
                        </div>
                    </div>
                    <div class="input-find">
                        <input type="text" placeholder="Tìm kiếm...">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
                <div class="content-news">
                    <div class="main-news">
                        <img src="../assets/images/news/main_newss.png" alt="">
                        <h2>VINAMILK 28 NĂM LIÊN TIẾP GIỮ DANH HIỆU HÀNG VIỆT NAM CHẤT LƯỢNG CAO</h2>
                        <span>15:09:08 PM Ngày 18/04/2024</span>
                    </div>
                    <div class="news-other-list">
                        <div class="news-other-item">
                            <div class="image">
                                <img src="../assets/images/news/other1.jpg" alt="">
                            </div>
                            <div class="text-content-news-other">
                                <h3>VINAMILK: SỨC MẠNH CHUYỂN ĐỔI XANH TỪ HƠN 10.000 LAO ĐỘNG</h3>
                                <span>19:10:12 PM Ngày 13/04/2024</span>
                            </div>
                        </div>
                        <div class="news-other-item">
                            <div class="image">
                                <img src="../assets/images/news/other1.jpg" alt="">
                            </div>
                            <div class="text-content-news-other">
                                <h3>VINAMILK: SỨC MẠNH CHUYỂN ĐỔI XANH TỪ HƠN 10.000 LAO ĐỘNG</h3>
                                <span>19:10:12 PM Ngày 13/04/2024</span>
                            </div>
                        </div>
                        <div class="news-other-item">
                            <div class="image">
                                <img src="../assets/images/news/other1.jpg" alt="">
                            </div>
                            <div class="text-content-news-other">
                                <h3>VINAMILK: SỨC MẠNH CHUYỂN ĐỔI XANH TỪ HƠN 10.000 LAO ĐỘNG</h3>
                                <span>19:10:12 PM Ngày 13/04/2024</span>
                            </div>
                        </div>
                        <div class="news-other-item">
                            <div class="image">
                                <img src="../assets/images/news/other1.jpg" alt="">
                            </div>
                            <div class="text-content-news-other">
                                <h3>VINAMILK: SỨC MẠNH CHUYỂN ĐỔI XANH TỪ HƠN 10.000 LAO ĐỘNG</h3>
                                <span>19:10:12 PM Ngày 13/04/2024</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>