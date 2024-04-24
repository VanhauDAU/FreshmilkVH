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
    <title>Liên Hệ</title>
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
<?php
	//kết nối
	require_once("connect.php");
	//truy vấn và thực hiện truy vấn
	
	if(isset($_POST["btn-submit"]))
	{
		//lấy dữ liệu trên form gởi đến server bằng phương thức truyền post
        $HoTen = $_POST["HoTen"];
		$DienThoai = $_POST["DienThoai"];
        $Email = $_POST["Email"];
        $NoiDung = $_POST["NoiDung"];
		$sql = "insert into user_contact(HoTen, DienThoai, Email, NoiDung)
							values('$HoTen', $DienThoai, '$Email', '$NoiDung')";
		//thực hiện insert
		$result = mysqli_query($conn, $sql);
		//$result trả về giá trị TRUE hoặc FALSE

		//kiểm tra thành công hay thất bại
		if($result)
		{
			//đóng kết nối và chuyển trang list.php
			mysqli_close($conn);
			echo "<script language='javascript'>alert('Gửi thông tin thành công');";
			echo "location.href='contact.php';</script>";
		}
		else
		{
			//thông báo lỗi thất bại ra màn hình --> đóng kết nối
			echo "Gửi thất bại: " . mysqli_error($conn);
			mysqli_close($conn);
		}
	}	
?>
    <header class="header fixed contact">
        <div class="main-content">
            <div class="body contact-header">
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
                                            <img src="/assets/images/brand_vinamilk.png" alt="" class="submenu__logo">
                                            <h2 class="slogan">Vinamilk "Vươn cao Việt Nam"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Top 1 Việt Nam</strong>
                                            <p class="desc">
                                                Vinamilk là công ty sữa hàng đầu tại Việt Nam, thành lập từ năm
                                                1976,
                                                nổi tiếng với các sản phẩm sữa chất lượng cao và hiện diện mạnh mẽ
                                                trên
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
                                            <img src="/assets/images/brand_TH.png" alt="" class="submenu__logo">
                                            <h2 class="slogan">Hạnh phúc đích thực – True Happiness"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Kinh doanh xuất sắc 2022-2023</strong>
                                            <p class="desc">
                                                Với quy trình sản xuất hiện đại và sự kiểm soát chất lượng nghiêm
                                                ngặt
                                                từ quy trình chăm sóc gia súc đến quy trình đóng gói, TH True Milk
                                                mang
                                                lại cho khách hàng sự tin cậy và niềm tin trong mỗi lần sử dụng sản
                                                phẩm
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
                                            <img src="/assets/images/brand_mochau.png" alt="" class="submenu__logo">
                                            <h2 class="slogan">Thảo nguyên xanh – Sữa mát lành"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Top 500 doanh nghiệp lớn Việt Nam</strong>
                                            <p class="desc">
                                                Thành lập năm 1958, Công ty Cổ phần Giống bò sữa Mộc Châu (Mộc Châu
                                                Milk) là đơn vị đầu tiên chăn nuôi bò sữa và chế biến sữa tại Việt
                                                Nam.
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
                                            <img src="/assets/images/brand_nutri.png" alt="" class="submenu__logo nuti">
                                            <h2 class="slogan">Giải pháp dinh dưỡng của chuyên gia"</h2>
                                            <i class="fa-solid fa-trophy"></i>
                                            <strong class="top">Top 1 Việt Nam</strong>
                                            <p class="desc">
                                                Với cam kết đem lại sức khỏe và cân bằng dinh dưỡng cho người tiêu
                                                dùng,
                                                Nutifood sử dụng công nghệ tiên tiến và nguồn nguyên liệu tự nhiên
                                                để
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
                        <li>
                            <a href="./news.php">Tin Tức</a>
                        </li>
                        <li class="active">
                            <a href="#footer">Liên Hệ</a>
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
    <main>
        <div class="container-contact">
            <div class="title-contact">
                <div class="body-title">
                    <h2 class="title">Liên hệ</h2>
                    <div class="dieuhuong">
                        <a href="../index.php" class="dashboard">Trang chủ</a>
                        <i class="fa-solid fa-angle-right"></i>
                        <a href="#!">Liên hệ</a>
                    </div>
                </div>

            </div>
            <div class="body-contact">
                <div class="main-content">
                    <div class="body contact">
                        <div class="content-form">
                            <div class="social-list">
                                <div class="social-item">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    <p class="desc">566 Núi Thành, Hoà Cường Nam, Hải Châu, Đà Nẵng, Việt Nam </p>
                                </div>
                                <div class="social-item">
                                    <i class="fa-solid fa-phone"></i>
                                    <p class="desc">0999999999</p>
                                </div>
                                <div class="social-item">
                                    <i class="fa-solid fa-envelope"></i>
                                    <p class="desc">email@gmail.com</p>
                                </div>
                            </div>
                            <div class="form-contact">
                                <h2 class="text-form">Liên hệ với chúng tôi</h2>
                                <form action="" method="post">
                                    <input type="text" name="HoTen" placeholder="Họ và tên">
                                    <input type="email" name="Email" placeholder="Email">
                                    <input type="tel" name="DienThoai" placeholder="Số điện thoại">
                                    <textarea name="NoiDung" id="NoiDung" cols="30" rows="5"
                                        placeholder="Nội dung"></textarea>
                                    <div class="btn-contact">
                                        <button class="btn-submit" name="btn-submit" >
                                            Gửi liên hệ
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="content-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.6411086925605!2d108.2220601!3d16.0321875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219ee4fe80ec5%3A0x6be9981175dc8deb!2zNTY2IE7DumkgVGjDoG5oLCBIb8OgIEPGsOG7nW5nIE5hbSwgSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1711782325666!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="register">
                <div class="main-content">
                    <div class="body-register">
                        <h2>Đăng ký nhận tin khuyến mãi</h2>
                        <form action="">
                            <div class="form-email">
                                <input type="email" placeholder="Nhập email của bạn">
                                <button class="btn btn-email">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer class="footer contact" id="footer" style="background: #0369a1">
        <div class="main-content">
            <div class="row">
                <!-- column 1 -->
                <div class="column">
                    <h3 class="heading lv3"></h3>
                    <img src="../assets/images/logo.png" alt="Lession" class="logo">
                    <p class="desc">Hãy cùng tận hưởng những phút giây tuyệt vời với các sản phẩm từ shop Presh
                        Milk.
                    </p>
                    <div class="socials">
                        <a href="#!">
                            <img src="../assets/icon/twitter.svg" alt="twitter" class="icon">
                        </a>
                        <a href="https://www.facebook.com/van.hau.1410">
                            <img src="../assets/icon/facebook.svg" alt="Facebook" class="icon">
                        </a>
                        <a href="#!">
                            <img src="../assets/icon/Linkedin.png" alt="Linkedin" class="icon">
                        </a>
                        <a href="#!">
                            <img src="../assets/icon/insta.svg" alt="instagram" class="icon">
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
                            <a href="#!">Liên hệ chúng tôi</a>
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
    <script>
        function show() {
            alert("Cảm ơn bạn đã gửi thông tin!");
        }
    </script>
</body>

</html>