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
                echo '<a href="./product_details.php" class="cart__product-item">
                            <img src="../assets/images/'.$_SESSION['giohang'][$i][0].'" alt="" class="cart__product-item--img">
                            <h3 class="cart__title-nameproduct">'.$_SESSION['giohang'][$i][1].'</h3>
                            <strong class="cart__price-product">'.$_SESSION['giohang'][$i][2].'</strong>
                        </a>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất Cả Sản phẩm</title>
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
    <link rel="stylesheet" href="../assets/css/all_product.css">
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
                        <li class="active">
                            <a href="#!">Sản phẩm</a>
                            <div class="submenu">
                                <ul>
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
                            <a href="./news.php">Tin Tức</a>
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
                            <?php echo $soluongsanphamgiohang?>
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
    <main>
        <div class="container">
            <div class="main-content">
                <div class="dieuhuong">
                    <a href="../index.php">Trang chủ</a>
                    <i class="fa-solid fa-angle-right"></i>
                    <a href="#!">Tất cả sản phẩm</a>
                </div>
                <div class="body all-product">
                    <div class="menu-all-product">
                        <h3>Danh mục</h3>
                        <ul class="menu-all-product__list">
                            <li class="active">
                                <a href="">Tất Cả Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="">Sữa Vinamilk</a>
                            </li>
                            <li>
                                <a href="">Sữa Nutifood</a>
                            </li>
                            <li>
                                <a href="">Sữa Mộc Châu</a>
                            </li>
                            <li>
                                <a href="">Sữa TH truemilk</a>
                            </li>
                        </ul>
                    </div>
                    <div class="all-product">
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG1">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 02 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/SuaHop_vinamilk2.png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNGG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG2">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="SuaHop_vinamilk2.png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 03 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG3</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG3">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 04 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/SuaChai_nuti.png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG4">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="SuaChai_nuti.png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 05 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG5">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 06 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG6">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="SuaHop_TH.png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 07 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG7</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 08 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG8</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 09 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG9</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        <!-- sp 01 -->
                        <div class="all-product-item">
                            <div class="image">
                                <img src="../assets/images/vnm100(1).png" alt="vinamilk"
                                    class="product-item-img zoom-in">
                            </div>
                            <form action="shopping_cart.php" method="post">
                                <div class="product-info">
                                    <h3 class="title">SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG</h3>
                                    <div class="price">
                                        <del>245,000₫</del>
                                        <strong>226,437₫</strong>
                                    </div>
                                    <div class="product-info-btn">
                                        <input type="number" name="soluong" id="soluong" value="1">
                                        <input type="submit" name="addcart" value="Đặt hàng" class="Dathang btn cart">
                                        <a href="./shopping_cart.php" class="btn buy">Mua Hàng</a>
                                    </div>
                                    <input type="hidden" name="tensp"
                                        value="SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% CÓ ĐƯỜNG">
                                    <input type="hidden" name="gia" value="226437">
                                    <input type="hidden" name="hinh" value="vnm100(1).png">
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>