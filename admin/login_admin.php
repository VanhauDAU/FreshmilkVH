<?php
    session_start();
    ob_start();
    include "./connect.php";
    include "./user.php";
    if((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        // Gọi hàm checkuser để kiểm tra thông tin đăng nhập
        $role = checkuser($user, $pass);
        $_SESSION['role'] = $role;
        if($role == 1){
            $_SESSION['username'] = $user;
            header('location: admin.php');
        }else{
            $txt_error = "username hoặc password không tồn tại";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập admin</title>
    <!-- reset css -->
    <link rel="stylesheet" href="../assets/css/reset.css ">
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
            width: 30%;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
                rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            max-width: calc(100% - 12px);
            height: 400px;
            background-color: #fff;
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
            margin-bottom:20px;
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
        }

        .create_account .new_account {
            margin-left: 10px;
            color: #0093e9;
        }

        @media only screen and (max-width: 740px) {
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
    <header class="header fixed">
        <div class="main-content">
            <div class="body login">
                <a href="./login_admin.php" onclick="logo_back()"><img src="../assets/images/logo.png" alt="" class="logo"></a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="content">
                <div class="text-heading">
                    <h1 class="title">Sign In Admin</h1>
                </div>
                <div class="form">
                    <!-- https://api-gateway.fullstack.edu.vn/action_page.php -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off" method="post">
                    <div class="form-group">
                            <label for="user" class="text">
                                Nhập tài khoản:
                            </label>
                            <input type="text" placeholder="VD: vanhau1234" id="user" required name="user">
                        </div>
                        <div class="form-group">
                            <label for="pass" class="text">
                                Password
                            </label>
                            <input type="password" placeholder="password" id="pass" required name="pass"
                                minlength="3">
                            <p class="error">Mật khẩu cần ít nhất 3 ký tự!</p>
                        </div>
                        <div class="btn submit_btn">
                            <input type="submit" value="Đăng Nhập" name="dangnhap">
                        </div>
                        <?php
                            if(isset($txt_error) && ($txt_error!="")){
                                echo "<font color='red'>".$txt_error."</font>";
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        function logo_back(){
            alert('Vui lòng đăng nhập!');
        }
    </script>
</body>

</html>