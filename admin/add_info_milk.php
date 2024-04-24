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
    <title>addMilk</title>
    <!-- reset css -->
    <link rel="stylesheet" href="/assets/css/reset.css">
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
    <!-- Font Poppins -->
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
            background: rgba(245, 240, 96, 0.1);
        }

        /* content */
        .add_milk {
            display: block;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
                rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
            max-width: calc(100% - 12px);
        }

        .add_milk .text-heading {
            position: relative;
        }

        .add_milk .text-heading .title {
            font-size: 2.5rem;
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            padding: 10px 0;
            font-weight: 600;
            background-color: var(--primary-color);
            background-image: linear-gradient(160deg, #0093e9 0%, #80d0c7 100%);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin: 0;
        }

        .text-heading button {
            position: absolute;
            top: 5px;
            right: 20px;
            background-color: transparent;
            border: none;
            font-size: 2.5rem;
            cursor: pointer;
            color: white;
        }

        .text-heading button:hover {
            opacity: 0.7;
        }

        /* Content */
        .content {
            padding: 10px 45px;
            background: white;
            border-radius: 10px;
        }

        input[type="text"],
        textarea,
        select {
            border: 1px solid #ccc;
            padding: 5px 10px;
            background-color: #f5f5f5;
            outline: none;
            border-radius: 5px;
            caret-color: var(--primary-color);
        }

        .content .text {
            display: block;
            color: var(--text-color);
            width: 250px;
            min-width: 250px;
            font-weight: 600;
        }

        .content h3 {
            display: inline;
            font-size: 1.2rem;
            opacity: 0.6;
        }

        .content table tr {
            display: block;
            margin-bottom: 20px;
        }

        .content #thanhphan,
        .content #benefit {
            width: 100%;
            height: 40px;
        }

        .content .btn {
            display: flex;
            justify-content: center;
        }

        .content .btn input {
            border-radius: 5px;
            border: none;
            padding: 10px 25px;
            background: var(--primary-color);
            color: white;
            font-size: 1.7rem;
            justify-content: center;
            cursor: pointer;
            transition: all 0.5s;
        }

        .content .btn input:hover {
            translate: 0px -7px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.26);
        }
        .container {
        position: relative;
        }
        .container .back {
        position: absolute;
        top: 5%;
        left: 10%;
        border-radius: 15px;
        padding: 10px 30px;
        background: orange;
        cursor: pointer;
        transition: all 0.5s ease;
        }
        .container .back:hover{
            opacity: 0.8;
            translate: 0px -10px;
        }
        .container .back a{
            color: white;
        }
    </style>

</head>

<body>
    <?php
        //kết nối
        require_once("connect.php");
        //truy vấn và thực hiện truy vấn
        
        if(isset($_POST["btn-add-milk"]))
        {
            //lấy dữ liệu trên form gởi đến server bằng phương thức truyền post
            $MaSP = $_POST["MaSP"];
            $TenSP = $_POST["TenSP"];
            $MaHS = $_POST["MaHS"];
            $LoaiSua = $_POST["LoaiSua"];
            $TrongLuong = $_POST["TrongLuong"];
            $DonGia = $_POST["DonGia"];
            $MoTa = $_POST["MoTa"];
            $sql = "insert into manage_milk(MaSP, TenSP, MaHS, LoaiSua, TrongLuong, DonGia, MoTa)
                                values('$MaSP', '$TenSP', '$MaHS', '$LoaiSua', $TrongLuong, $DonGia,'$MoTa')";
            //thực hiện insert
            $result = mysqli_query($conn, $sql);
            //$result trả về giá trị TRUE hoặc FALSE

            //kiểm tra thành công hay thất bại
            if($result)
            {
                //đóng kết nối và chuyển trang list.php
                mysqli_close($conn);
                echo "<script language='javascript'>alert('Thêm mới thành công');";
                echo "location.href='manage_milk.php';</script>";
            }
            else
            {
                //thông báo lỗi thất bại ra màn hình --> đóng kết nối
                echo "Thêm mới thất bại: " . mysqli_error($conn);
                mysqli_close($conn);
            }
        }	
        $sql = "select * from manage_brand";
        $result = mysqli_query($conn, $sql);
    ?>
    <main>
        <div class="container">
            <div class="back">
                <a href="./manage_milk.php">Quay lại</a>
            </div>
            <div class="add_milk">
                
                <div class="text-heading">
                    <h1 class="title">Thêm sữa mới</h1>
                    <button>x</button>
                </div>
                <div class="content">
                    <form action="" autocomplete="off" method="post">
                        <table>
                            <tr>
                                <td>
                                    <label for="MaSP" class="text">
                                        Mã sữa:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" id="MaSP" placeholder="VD: VNM001" required size="10"
                                        name="MaSP">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="TenSP" class="text">
                                        Tên sữa:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" placeholder="VD: Vinamilk chocolate" required id="TenSP"
                                        name="TenSP">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="MaHS" class="text">
                                        Mã Hãng sữa:
                                    </label>
                                </td>
                                <td>
                                    <select name="MaHS" id="MaHS">
                                        <option value="" selected>--Chọn hãng sữa--</option>
                                        <?php
                                            while($rowHS = mysqli_fetch_assoc($result)){
                                        ?>
                                                    <option value="<?php echo $rowHS['MaHS'];?>"><?php echo $rowHS['MaHS'];?></option>
                                        <?php
                                            }
                                            mysqli_close($conn);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="LoaiSua" class="text">
                                        Loại sữa:
                                    </label>
                                </td>
                                <td>
                                    <select name="LoaiSua" id="LoaiSua">
                                        <option value="" selected>--Chọn loại sữa--</option>
                                        <option >Sữa bột</option>
                                        <option>Sữa hộp</option>
                                        <option>Sữa giấy</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="TrongLuong" class="text">
                                        Trọng lượng:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" id="TrongLuong" name="TrongLuong" required size="10">
                                    <h3>(gr hoặc ml)</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="DonGia" class="text">
                                        Đơn giá:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" id="DonGia" name="DonGia" required size="10">
                                    <h3>(VNĐ)</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="MoTa" class="text">
                                        Mô tả:
                                    </label>
                                </td>
                                <td>
                                    <textarea type="text" name="MoTa" id="MoTa" cols="30" rows="10" required>
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="image" class="text">
                                        Hình ảnh:
                                    </label>
                                </td>
                                <td>
                                    <input type="file" accept=".png, .jpg, .gif" name="file" required>
                                </td>
                            </tr>
                        </table>
                        <div class="btn">
                            <input type="submit" value="Thêm mới" name="btn-add-milk">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>