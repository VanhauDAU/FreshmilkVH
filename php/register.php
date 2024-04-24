<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- reset css -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <!-- icon -->
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
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Container */
        .container {
            height: 100vh;
            background: var(--background-main);
        }

        /* content */
        .container .content {
            position: relative;
            width: 30%;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
                rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            max-width: calc(100% - 12px);
            height: 400px;
            background-color: #fff;
            height: 400px;
        }

        .content .text-heading {
            display: block;
            align-items: center;
            background-color: #0093e9;
            background-image: linear-gradient(160deg, #0093e9 0%, #80d0c7 100%);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px 25px;
        }

        .text-heading .title {
            font-size: 3rem;
            color: white;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* form */
        .container .content .form {
            background: white;
            border-radius: 10px;
            padding: 30px 25px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            display: flex;
            margin: 20px 0px;
            border: none;
            background-color: #f5f5f5;
            padding: 10px 25px;
            border-radius: 5px;
            outline: none;
        }

        input::placeholder {
            font-size: 1.5rem;
        }

        .form:has(:invalid) .submit_btn {
            opacity: 0.5;
            pointer-events: none;
        }

        .form .text {
            font-size: 2rem;
            color: #71717a;
        }

        .form .btn {
            display: flex;
            justify-content: center;
        }

        .form-group:has(:invalid:not(:placeholder-shown)) .error {
            display: block;
        }

        .form .error {
            font-size: 1.4rem;
            color: red;
            margin-bottom: 15px;
            margin-top: -5px;
            display: none;
        }

        .checkSignUp,
        input[type="submit"] {
            width: 35%;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            background-color: #0093e9;
            background-image: linear-gradient(160deg, #0093e9 0%, #80d0c7 100%);
            color: white;
            cursor: pointer;
            font-size: 1.7rem;
            text-transform: uppercase;
        }

        .form-group__remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 14px 0;
            font-size: 1.6rem;
        }

        .remember_me .title_remember {
            cursor: pointer;
            opacity: 0.9;
        }

        .forget_account a {
            color: #0093e9;
        }

        input[type="submit"]:hover {
            opacity: 0.9;
        }

        .create_account {
            display: flex;
            margin-top: 20px;
            font-size: 1.4rem;
            justify-content: center;
            align-items: center;
        }

        .btn-signin,
        .btn-signUp {
            border: none;
            background: none;
            margin-left: 10px;
            color: #0093e9;
            cursor: pointer;
        }

        /* Sign Up */
        .content__signup {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .content__signup @media only screen and (max-width: 740px) {
            .container .content {
                width: 90%;
            }

            input[type="submit"] {
                width: 5100%;
            }
        }
    </style>
</head>

<body>
<?php
        require_once("connect.php");
        if(isset($_POST["btn-dangky"]))
        {
            $tk = $_POST["User-dangky"];
            $HoTen = $_POST["Hoten-dangky"];
            $pass = $_POST["Pass-dangky"];
            $sql = "insert into user(TenUser, user, pass)
                    values('$HoTen', '$tk','$pass')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                mysqli_close($conn);
                echo "<script language='javascript'>alert('Đăng ký thành công');";
                echo "location.href='login.php';</script>";
            }
            else
            {
                echo "Đăng ký thất bại: " . mysqli_error($conn);
                mysqli_close($conn);
            }
        }	
        $sql = "select * from manage_brand";
        $result = mysqli_query($conn, $sql);
    ?>
    <header class="header fixed">
        <div class="main-content">
            <div class="body login">
                <a href="../index.php" onclick="logo_back()"><img src="../assets/images/logo.png" alt="" class="logo"></a>
                <div class="dieuhuong">
                    <a href="../index.php">Trang chủ</a>
                    <i class="fa-solid fa-angle-right"></i>
                    <a href="#!">Đăng ký</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="content">
                <div class="content__signup">
                    <div class="text-heading">
                        <h1 class="title">ĐĂNG KÝ</h1>
                    </div>
                    <div class="form">
                        <form action="" autocomplete="off" method="post" id="signup-form">
                        <div class="form-group">
                                <label for="User-dangky" class="text">
                                    Tài khoản:
                                </label>
                                <input type="text" placeholder="VD: vanhau123" id="User-dangky" required name="User-dangky">
                            </div>
                            <div class="form-group">
                                <label for="Hoten-dangky" class="text">
                                    Nhập tên của bạn:
                                </label>
                                <input type="text" placeholder="Họ và tên của bạn" id="Hoten-dangky" required name="Hoten-dangky">
                            </div>
                            <div class="form-group">
                                <label for="Pass-dangky" class="text">
                                    Mật khẩu:
                                </label>
                                <input type="password" placeholder="mật khẩu" id="Pass-dangky" required name="Pass-dangky"
                                    minlength="3">
                                <p class="error">Mật khẩu cần ít nhất 3 ký tự!</p>
                            </div>
                            <div class="btn submitSignUp">
                                <button type="submit" onclick="submitSignIn()" class="checkSignUp" name="btn-dangky">Đăng ký</button>
                            </div>
                            
                        </form>
                        <div class="create_account">
                                <h3 class="account">Bạn đã có tài khoản?</h3>
                                <a href="./login.php"><button class="btn-signin">Đăng nhập</button></a>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>

</html>