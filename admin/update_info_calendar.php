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
    <title>Cập Nhật Phiên Làm Việc</title>
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
    <link rel="stylesheet" href="../assets/css/rps_index.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        font-weight: 600;
        font-size: 1.9rem;
        color: transparent;
        background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        text-transform: uppercase;
        background-clip:text;
        -webkit-background-clip:text;
        margin-top: 0;
        text-align: center;
    }
    form {
        margin-top: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    input[type="time"],
    input[type="date"],
    input[type="input"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<?php
	
	//lấy id truyền trên đường dẫn từ trang list.php --> nằm trong mảng $_GET
	$ID = $_GET["ID"];
	//lấy thông tin của thể loại có id lấy được từ đường dẫn
	require_once("connect.php");
	$sql = "select * from manage_calendar where ID = $ID";
	//$result là 1 table có 1 hàng duy nhất, và đó là hàng chứa thông tin cần đưa vào form
	$result = mysqli_query($conn, $sql);
	//lấy hàng duy nhất đó ra --> $row
	$row = mysqli_fetch_assoc($result);
	//đưa nội dung cũ vào form	
	//update
	if(isset($_POST["btnCapnhat"]))
	{
		//lấy dữ liệu trên form gởi đến server bằng phương thức truyền post
		$ID = $_POST["ID"];
		$MaNV = $_POST["MaNV"];
		$NgayPhien = $_POST["NgayPhien"];
		$TGBatDau = $_POST["TGBatDau"];
		$TGKetThuc = $_POST["TGKetThuc"];
		$sql = "update manage_calendar set  ID = $ID,
                                            MaNV = '$MaNV',
                                            NgayPhien = '$NgayPhien',
                                            TGBatDau = '$TGBatDau',
                                            TGKetThuc = '$TGKetThuc'
								where ID = $ID";
		//thực hiện insert
		$result = mysqli_query($conn, $sql);
		//$result trả về giá trị TRUE hoặc FALSE

		//kiểm tra thành công hay thất bại
		if($result)
		{
			//đóng kết nối và chuyển trang list.php
			mysqli_close($conn);
			echo "<script language='javascript'>alert('Cập nhật thành công');";
			echo "location.href='manage_calendar.php';</script>";
		}
		else
		{
			//thông báo lỗi thất bại ra màn hình --> đóng kết nối
			echo "Cập nhật thất bại: " . mysqli_error($conn);
			mysqli_close($conn);
		}
	}
?>
<div class="container">
    <h2>Chỉnh sửa phiên làm việc</h2>
    <form action="" autocomplete="off" method="POST">
    <div class="form-group">
            <label for="ID">ID</label>
            <input type="input" id="ID" name="ID" required value="<?php echo $row['ID']; ?>">
        </div>
        <div class="form-group">
            <label for="MaNV">MaNV</label>
            <input type="input" id="MaNV" name="MaNV" required value="<?php echo $row['MaNV']; ?>">
        </div>
        <div class="form-group">
            <label for="NgayPhien">Ngày Phiên</label>
            <input type="date" id="NgayPhien" name="NgayPhien" required value="<?php echo $row['NgayPhien']; ?>">
        </div>
        <div class="form-group">
            <label for="TGBatDau">Thời gian bắt đầu:</label>
            <input type="time" id="TGBatDau" name="TGBatDau" required value="<?php echo $row['TGBatDau']; ?>">
        </div>
        <div class="form-group">
            <label for="TGKetThuc">Thời gian kết thúc:</label>
            <input type="time" id="TGKetThuc" name="TGKetThuc" required value="<?php echo $row['TGKetThuc']; ?>">
        </div>
        <input type="submit" class="btn" value="Lưu chỉnh sửa" name="btnCapnhat">
    </form>
</div>
</body>
</html>