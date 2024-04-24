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
    <title>Thêm Phiên Làm Việc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
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
            color: #0093E9;
            text-transform: uppercase;
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
        input[type="text"],
        select,
        input[type="time"],
        input[type="date"] {
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
	//kết nối
	require_once("connect.php");
	//truy vấn và thực hiện truy vấn
	
	if(isset($_POST["btn-add-phongban"]))
	{
		//lấy dữ liệu trên form gởi đến server bằng phương thức truyền post
        $MaPB = $_POST["MaPB"];
		$TenPB = $_POST["TenPB"];
		$sql = "insert into phongban( MaPB, TenPB)
							values('$MaPB', '$TenPB')";
		//thực hiện insert
		$result = mysqli_query($conn, $sql);
		//$result trả về giá trị TRUE hoặc FALSE

		//kiểm tra thành công hay thất bại
		if($result)
		{
			//đóng kết nối và chuyển trang list.php
			mysqli_close($conn);
			echo "<script language='javascript'>alert('Thêm mới thành công');";
			echo "location.href='phongban.php';</script>";
		}
		else
		{
			//thông báo lỗi thất bại ra màn hình --> đóng kết nối
			echo "Thêm mới thất bại: " . mysqli_error($conn);
			mysqli_close($conn);
		}
	}	
    $sql = "SELECT * FROM manage_staff";
$result = mysqli_query($conn, $sql);
?>
    <div class="container">
        <h2>Thêm Phòng ban</h2>
        <form action="" autocomplete="off" method="POST">
            <div class="form-group">
                <label for="MaPB">Mã Phòng Ban: *</label>
                <input type="text" id="MaPB" name="MaPB" required>
            </div>
            <div class="form-group">
                <label for="TenPB">Tên Phòng Ban: *</label>
                <input type="text" id="TenPB" name="TenPB" required>
            </div>
            <input type="submit" class="btn" value="Thêm" name="btn-add-phongban">
        </form>
    </div>
</body>
</html>
