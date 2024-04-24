<?php
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if(isset($_SESSION['username'])) {
        $welcome_message = "Xin chào, " . $_SESSION['username'];
        $login_logout_link = '<a href="./php/logout.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></a>';
    } else {
        $welcome_message = '<a href="./php/login.php" class="btn__signin">Đăng Nhập</a>';
        $login_logout_link = '';
    }
    //đếm số lượng sản phẩm trong giỏ hàng
    $soluongsanphamgiohang = isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0;
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
    //lấy dữ liệu từ form
    if(isset($_POST['addcart']) && ($_POST['addcart'])){
        $hinh = $_POST['hinh'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        //kiểm tra sản phẩm có trùng trong giỏ hàng hay không
        $fl=0;
        //Nếu không trùng sản phẩm thì thêm mới 
        if($fl == 0){
            //thêm mới sản phẩm vào giỏ hàng
            $sp=[$hinh,$tensp,$gia];
            $_SESSION['giohang'][] = $sp;
        }
    }
    function showgiohang(){
        if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){
            for($i = 0; $i < sizeof($_SESSION['giohang']); $i++){
                echo '<a href="./php/product_details.php" class="cart__product-item">
                            <img src="./assets/images/'.$_SESSION['giohang'][$i][0].'" alt="" class="cart__product-item--img">
                            <h3 class="cart__title-nameproduct">'.$_SESSION['giohang'][$i][1].'</h3>
                            <strong class="cart__price-product">'.$_SESSION['giohang'][$i][2].'</strong>
                        </a>';
            }
        }
    }
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Milk</title>
    <!-- reset css -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- icon font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/rps_index.css">
    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
    </style>
</head>

<body>
    <header class="header fixed dashboard">
        <div class="main-content">

            <div class="body">
                <label class="toggle-menu">
                    <label for="check-toggle"><i class="fa-solid fa-bars"></i></label>
                    <input type="checkbox" id="check-toggle">
                    <div class="background-toggle-menu"></div>
                </label>
                <a href=""><img src="./assets/images/logo.png" alt="" class="logo"></a>
                <div class="navbar">
                    <ul class="navbar__list">
                        <li class="active">
                            <a href="./index.php">Trang Chủ</a>
                        </li>
                        <li>
                            <a href="./php/info_brand.php">Thương Hiệu</a>
                            <div class="submenu brand">
                                <ul>
                                    <li>
                                        <a href="https://www.vinamilk.com.vn/vi">vinamilk</a>
                                        <i class="icon__sub fa-solid fa-angle-right"></i>
                                        <div class="submenu__brand">
                                            <img src="./assets/images/brand_vinamilk.png" alt="" class="submenu__logo">
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
                                            <img src="./assets/images/brand_TH.png" alt="" class="submenu__logo">
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
                                            <img src="./assets/images/brand_mochau.png" alt="" class="submenu__logo">
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
                                            <img src="./assets/images/brand_nutri.png" alt=""
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
                            <a href="./php/all_product.php">Sản phẩm</a>
                            <div class="submenu">
                                <ul>
                                    <li>
                                        <a href="./php/all_product.php">Tất cả sản phẩm</a>
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
                        <li>
                            <a href="./php/news.php">Tin Tức</a>
                        </li>
                        <li>
                            <a href="./php/contact.php">Liên Hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="header__action">
                    <div class="cart">
                        <a href="./php/shopping_cart.php">
                            <h2 class="cart__title">Giỏ hàng</h2>
                            <i class="cart__icon fa-solid fa-cart-shopping"></i>
                        </a>
                        <div class="count-product"> 
                            <?php echo $soluongsanphamgiohang?>
                        </div>
                        <div class="sub-menu-cart">
                            <h3 class="title">Sản phẩm mới thêm</h3>
                            <div class="cart__product-list">
                                <?php showgiohang()?>
                                <div class="cart__btn-buy-product">
                                    <a href="./php/shopping_cart.php">
                                        Xem Giỏ Hàng
                                    </a>
                                </div>
                            </div>
                        </div>
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
    <main>
        <div class="container">
            <div class="hero">
                <div class="image-cow">
                    <img src="./assets/images/grow.png" alt="cow">
                </div>
                <div class="main-content">
                    <div class="body">

                        <video class="home__bg-video" src="./assets/video/tvc-milk.mp4" autoplay="" muted=""
                            playsinline="" loop=""></video>
                        <div class="hero__brand">
                            <img class="brand__logo" src="./assets/images/brand_vinamilk.png" alt="vinamilk">
                            <img class="brand__logo" src="./assets/images/brand_TH.png" alt="TH">
                            <img class="brand__logo" src="./assets/images/brand_nutri.png" alt="nuti">
                            <img class="brand__logo" src="./assets/images/brand_mochau.png" alt="mocchau">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Khuyến mãi -->
        <div class="promotion">
            <div class="body__promotion">
                <div class="promotion__images">
                    <img src="./assets/images/quancaomilk.png" alt="PreshMilk">
                </div>
                <div class="promotion__content">
                    <h2 class="text-heading">Mua sữa ưu đãi <br> hạnh phúc dài dài</h2>
                    <img src="./assets/images/con_cow.png" alt="cow" class="img_cow">
                    <img src="./assets/images/decor_promotion.png" alt="" class="decor__promotion">
                    <a href="#product" class="btn__promotion">
                        Mua Ngay
                    </a>
                </div>
            </div>
        </div>
        <!-- sản phẩm -->
        <div class="product" id="product">
            <div class="main-content">
                <div class="body">
                    <div class="body__row-top">
                        <h1 class="title">Sản phẩm nổi bật</h1>
                    </div>
                    <div class="product__list">
                        <div class="show-add-cart" style="display: none;">
                            <i class="icon-check fa-solid fa-check"></i>
                            <h1>Sản phẩm đã được thêm vào giỏ hàng!</h1>
                        </div>

                        <!-- Product 1 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/SuaHop_vinamilk2.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA HỘP VINAMILK KHÔNG ĐƯỜNG 100%</h3>
                                <form action="./php/shopping_cart.php" method="post">
                                    <div class="price">
                                        <del>295.000đ</del>
                                        <strong>273.500đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                            <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA HỘP VINAMILK KHÔNG ĐƯỜNG 100%">
                                    <input type="hidden" name="gia" value="273500">
                                    <input type="hidden" name="hinh" value="SuaHop_vinamilk2.png">
                                </form>
                            </div>
                            <div class="product__item--sale">
                                <img src="./assets/images/flash_sale.png" alt="sale">
                            </div>
                        </div>
                        <!-- Product 2 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/vnm100.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA LON NUTIFOOD - THƠM NGON BỔ DƯỠNG</h3>
                                <form action="./php/shopping_cart.php" method="post">
                                    <div class="price">
                                        <del>395.000đ</del>
                                        <strong>363.500đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                            <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA LON NUTIFOOD - THƠM NGON BỔ DƯỠNG">
                                    <input type="hidden" name="gia" value="363500">
                                    <input type="hidden" name="hinh" value="vnm100.png">
                                </form>
                            </div>
                            <div class="product__item--sale">
                                <img src="./assets/images/flash_sale.png" alt="sale">
                            </div>
                        </div>
                        <!-- product 3 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/SuaLon_Nuti.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA LON NUTIFOOD - THƠM NGON BỔ DƯỠNG</h3>
                                <form action="./php/shopping_cart.php" method="post">
                                    <div class="price">
                                        <del>395.000đ</del>
                                        <strong>363.500đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                            <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA LON NUTIFOOD - THƠM NGON BỔ DƯỠNG">
                                    <input type="hidden" name="gia" value="363500">
                                    <input type="hidden" name="hinh" value="SuaHop_TH.png">
                                </form>
                            </div>
                            <div class="product__item--sale">
                                <img src="./assets/images/flash_sale.png" alt="sale">
                            </div>
                        </div>
                        <!-- Product 4 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/SuaHop_TH.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA HỘP TH TRUEMILK THƠM NGON TỪNG GIỌT SỮA</h3>
                                <form action="./php/shopping_cart.php" method="post">
                                    <div class="price">
                                        <del>245.000đ</del>
                                        <strong>233.500đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                            <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA HỘP TH TRUEMILK THƠM NGON TỪNG GIỌT SỮA">
                                    <input type="hidden" name="gia" value="200123">
                                    <input type="hidden" name="hinh" value="SuaHop_TH.png">
                                </form>
                            </div>
                            <div class="product__item--sale">
                                <img src="./assets/images/flash_sale.png" alt="sale">
                            </div>
                        </div>
                        <!-- Product 5 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/SuaHop_MC2.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA TƯƠI THANH TRÙNG MỘC CHÂU MILK</h3>
                                <form action="./php/shopping_cart.php" method="post">
                                    <div class="price">
                                        <del>245.000đ</del>
                                        <strong>218.500đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                            <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI THANH TRÙNG MỘC CHÂU MILK">
                                    <input type="hidden" name="gia" value="200123">
                                    <input type="hidden" name="hinh" value="SuaHop_MC2.png">
                                </form>
                            </div>
                            <div class="product__item--sale">
                                <img src="./assets/images/flash_sale.png" alt="sale">
                            </div>
                        </div>
                        <!-- Product 6 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/SuaHop_vinamilk.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA TƯƠI TIỆT TRÙNG MỘC CHÂU MỚI CÓ ĐƯỜNG</h3>
                                <form action="./php/shopping_cart.php" method="post">
                                    <div class="price">
                                        <del>245.000đ</del>
                                        <strong>200.123đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                            <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI VINAMILK TIỆT TRÙNG NGON BỔ DƯỠNG">
                                    <input type="hidden" name="gia" value="200123">
                                    <input type="hidden" name="hinh" value="SuaHop_vinamilk.png">
                                </form>
                            </div>
                            <div class="product__item--sale">
                                <img src="./assets/images/flash_sale.png" alt="sale">
                            </div>
                        </div>
                        <!-- Product 7 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/SuaChai_nuti.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                <form action="./php/shopping_cart.php" method="post" class="productForm">
                                    <div class="price">
                                        <del>245.000đ</del>
                                        <strong>226.437đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="SuaChai_nuti.png">
                                </form>
                            </div>
                        </div>
                        <!-- Product 8 -->
                        <div class="product__item">
                            <div class="image">
                                <img loading="lazy" src="./assets/images/SuaHop_MC2.png" alt="vinamilk"
                                    class="product__item--img">
                            </div>
                            <div class="product_info">
                                <h3 class="product__item--title">SỮA TƯƠI TIỆT TRÙNG MỘC CHÂU MỚI CÓ ĐƯỜNG</h3>
                                <form action="./php/shopping_cart.php" method="post">
                                    <div class="price">
                                        <del>245.000đ</del>
                                        <strong>250.100đ</strong>
                                        <input type="number" name="soluong" id="soluong" value="1">
                                    </div>
                                    <div class="product__info--btn">
                                            <input type="submit" name="addcart" value="Đặt hàng" class="Dathang">
                                        <a href="./php/product_details.php">Xem thêm</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG MỘC CHÂU MỚI CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="250100">
                                    <input type="hidden" name="hinh" value="SuaHop_MC2.png">
                                </form>
                            </div>
                            <div class="product__item--sale">
                                <img src="./assets/images/flash_sale.png" alt="sale">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner -->
        <div class="banner">
            <div class="main-content banner">
                <div class="body">
                    <div class="banner_content">
                        <h1 class="title">Đồng hành cùng con yêu trên chặng đường khôn lớn</h1>
                        <img loading="lazy" src="./assets/images/khonlon.png" alt="khôn lớn">
                    </div>
                    <div class="banner__images">
                        <img loading="lazy" src="./assets/images/SuaLon_banner.png" alt=""
                            class="banner__img wow animate__animated animate__slideInRight">
                    </div>
                </div>
            </div>
        </div>
        <!-- sọc sọc -->
        <div class="footer__decor">
        </div>
        <!-- mạng xã hội -->
        <div class="main__socials">
            <a href="#!">
                <i class="icon fa-brands fa-twitter"></i>
            </a>
            <a href="https://www.facebook.com/van.hau.1410">
                <i class="icon fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.linkedin.com/in/h%E1%BA%ADu-l%C3%AA-v%C4%83n-0a3065303/">
                <i class="icon fa-brands fa-linkedin"></i>
            </a>
            <a href="https://www.instagram.com/levanhau122?igsh=eWo0dGdnOGgxZXV2">
                <i class="icon fa-brands fa-instagram"></i>
            </a>
        </div>
    </main>
    <footer class="footer" id="footer">
        <div class="main-content">
            <div class="row">
                <!-- column 1 -->
                <div class="column">
                    <h3 class="heading lv3"></h3>
                    <img src="./assets/images/logo.png" alt="Lession" class="logo">
                    <p class="desc">Hãy cùng tận hưởng những phút giây tuyệt vời với các sản phẩm từ shop Presh Milk.
                    </p>
                    <div class="socials">
                        <a href="#!">
                            <img src="./assets/icon/twitter.svg" alt="twitter" class="icon">
                        </a>
                        <a href="https://www.facebook.com/van.hau.1410">
                            <img src="./assets/icon/facebook.svg" alt="Facebook" class="icon">
                        </a>
                        <a href="#!">
                            <img src="./assets/icon/Linkedin.png" alt="Linkedin" class="icon">
                        </a>
                        <a href="#!">
                            <img src="./assets/icon/insta.svg" alt="instagram" class="icon">
                        </a>
                    </div>
                </div>
                <!-- Column 2 -->
                <div class="column">
                    <h3 class="title">Shop Presh Milk</h3>
                    <ul class="list">
                        <li>
                            <a href="#!">Về chúng tôi</a>
                        </li>
                        <li>
                            <a href="#!">Thành tích nổi bật</a>
                        </li>
                        <li>
                            <a href="#!">Lịch sử phát triển</a>
                        </li>
                        <li>
                            <a href="#!">Đơn vị thành viên</a>
                        </li>
                    </ul>
                </div>
                <!-- column 3 -->
                <div class="column">
                    <h3 class="title">Hỗ trợ</h3>
                    <ul class="list">
                        <li>
                            <a href="#!">Câu hỏi thường gặp</a>
                        </li>
                        <li>
                            <a href="#!">Điều khoản & điều kiện</a>
                        </li>
                        <li>
                            <a href="#!">Chính sách bảo mật</a>
                        </li>
                        <li>
                            <a href="./php/contact.php">Liên hệ chúng tôi</a>
                        </li>
                    </ul>
                </div>
                <!-- column 4 -->
                <div class="column">
                    <h3 class="title">Địa chỉ</h3>
                    <ul class="list">
                        <li>
                            <a href="#!">
                                <strong>Location:</strong> 295 Huy Cận, Khuê Trung, Cẩm Lệ, Đà Nẵng
                            </a>
                        </li>
                        <li>
                            <a href="mailto:levanhaum@gmail.com">
                                <strong>Email:</strong> levanhaum@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="tel:0816548150">
                                <strong>Phone:</strong> +84 9816548150
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright ©2024 Bài Tập Cuối Kỳ - Nhóm Lê Văn Hậu</p>
            </div>
        </div>
    </footer>
    <script src="./js/index.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>