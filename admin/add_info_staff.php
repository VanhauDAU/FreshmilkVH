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
    <title>Cập nhật thông tin</title>
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
    <style>
        .container {
            background: var(--background-main);
            gap: 100px;
            position: relative;
            padding: 0px 150px;
        }

        .content-body {
            display: flex;
        }

        .container .image img {
            border-radius: 30px;
            margin-right: 120px;
        }

        .container .milk img {
            height: 150px;
            position: absolute;
            bottom: 30px;
            left: 30px;
            transform: rotate(20deg);
        }

        .content {
            position: relative;
            background: white;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            max-width: calc(100% - 48px);
        }

        .content-body>a {
            position: absolute;
            top: 40px;
            left: 60px;
            padding: 10px 20px;
            background: red;
            border-radius: 10px;
            color: white;
        }

        .content-body .title {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            text-transform: uppercase;
            padding: 20px 70px;
            background-color: var(--primary-color);
            background-image: linear-gradient(160deg, #0093e9 0%, #80d0c7 100%);
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .content-body .back-staff{
            position: absolute;
            top: 10px;
            margin-bottom: 20px;
        }
        .content .form {
            position: relative;
            padding: 20px 30px;
        }

        .content table tr {
            display: block;
            margin-bottom: 20px;
        }

        .form table label {
            display: block;
            color: var(--text-color);
            width: 200px;
            min-width: 150px;
            font-weight: 600;
        }

        input {
            padding: 10px 20px 10px 5px;
            border-radius: 4px;
            outline: none;
            border: 1px solid #ccc;
            font-size: 1.7rem;
            caret-color: #0093e9;
        }

        /* btn */
        .form .btn {
            display: block;
            text-align: center;
        }

        .form .btn button {
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            background-color: #0093e9;
            color: white;
            text-transform: uppercase;
            font-size: 1.7rem;
            cursor: pointer;
            transition: translate 0.3s;
        }

        .form .btn button:hover {
            opacity: 0.8;
            translate: 0px -4px;
        }

        .form .cow img {
            position: absolute;
            top: 0;
            left: -120px;
            height: 150px;
        }

        @media only screen and (max-width: 1024px) {
            .container {
                padding: 0;
            }

            .image {
                display: none;
            }
        }
    </style>
</head>

<body>
<?php
	//kết nối
	require_once("connect.php");
	//truy vấn và thực hiện truy vấn
	
	if(isset($_POST["btn-add-staff"]))
	{
		//lấy dữ liệu trên form gởi đến server bằng phương thức truyền post
		$MaNV = $_POST["MaNV"];
        $TenNV = $_POST["TenNV"];
        $NgaySinh = $_POST["NgaySinh"];
        $MaPB = $_POST["MaPB"];
		$GioiTinh = $_POST["GioiTinh"];
		$DiaChi = $_POST["DiaChi"];
		$DienThoai = $_POST["DienThoai"];
        $Email = $_POST["Email"];
		$sql = "insert into manage_staff(MaNV, TenNV, NgaySinh,MaPB, GioiTinh, DiaChi, DienThoai, Email)
							values('$MaNV', '$TenNV', '$NgaySinh','$MaPB',$GioiTinh, '$DiaChi', $DienThoai, '$Email')";
		//thực hiện insert
		$result = mysqli_query($conn, $sql);
		//$result trả về giá trị TRUE hoặc FALSE

		//kiểm tra thành công hay thất bại
		if($result)
		{
			//đóng kết nối và chuyển trang list.php
			mysqli_close($conn);
			echo "<script language='javascript'>alert('Thêm mới thành công');";
			echo "location.href='manage_staff.php';</script>";
		}
		else
		{
			//thông báo lỗi thất bại ra màn hình --> đóng kết nối
			echo "Thêm mới thất bại: " . mysqli_error($conn);
			mysqli_close($conn);
		}
	}	
        $sql = "select * from phongban";
        $result = mysqli_query($conn, $sql);
?>
    <div class="container update-info" style="height: 100vh;">
        <div class="content-body">
            <a href="./manage_staff.php" class="back-staff">Quay lại</a>
            <div class="image">
                <img loading="lazy" src="../assets/images/update_info_custom.png" alt="update customer information">
            </div>
            <div class="content">
                <h1 class="title">Thêm mới thông tin nhân viên</h1>
                <div class="form">
                    <form action="" autocomplete="off" method="post">
                        <table>
                            <tr>
                                <td>
                                    <label for="MaNV">
                                        Mã Nhân Viên:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" name="MaNV" id="MaNV" placeholder="VD: NV01" size="5" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="TenNV">
                                        Tên Nhân Viên:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" placeholder="VD: Nguyen Van A" id="TenNV" name="TenNV" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="NgaySinh">
                                        Ngày Sinh:
                                    </label>
                                </td>
                                <td>
                                    <input type="date" placeholder="VD: 01/01/2000" id="NgaySinh" name="NgaySinh" required>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label for="MaPB">
                                        Chọn Phòng Ban:
                                    </label>
                                </td>
                                <td>
                                    <select name="MaPB" id="MaPB">
                            <?php
                                while($rowPB = mysqli_fetch_assoc($result)){
                            ?>
                                        <option value="<?php echo $rowPB['MaPB'];?>"><?php echo $rowPB['TenPB'];?></option>
                            <?php
                                }
                                mysqli_close($conn);
                            ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label>
                                        Phái:
                                    </label>
                                </td>
                                <td>
                                    <select name="GioiTinh" id="GioiTinh">
                                        <option>Chọn giới tính</option>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="DiaChi">
                                        Địa chỉ:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" required placeholder="Nhập địa chỉ..." id="DiaChi"
                                        name="DiaChi">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="DienThoai">
                                        Điện thoại:
                                    </label>
                                </td>
                                <td>
                                    <input type="text" size="15" id="DienThoai" name="DienThoai" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="Email">
                                        Email:
                                    </label>
                                </td>
                                <td>
                                    <input type="email" placeholder="Nhập email..." id="Email" name="Email" required>
                                </td>
                            </tr>
                        </table>
                        <div class="btn">
                            <button type="submit" name="btn-add-staff">Thêm mới</button>
                        </div>
                    </form>
                    <div class="cow">
                        <img loading="lazy" src="../assets/images/grow.png" alt="con cow">
                    </div>
                </div>
            </div>
            <div class="milk">
                <img loading="lazy" src="../assets/images/hop_milk.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>