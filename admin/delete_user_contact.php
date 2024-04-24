
<?php
    require_once("connect.php");

    // Kiểm tra xem tham số MaHS có tồn tại không
    if(isset($_GET["ID"])) {
        $id = $_GET["ID"];
        $sql = "DELETE FROM user_contact WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            mysqli_close($conn);
            echo "<script language='javascript'>alert('Xóa thành công');";
            echo "location.href='user_contact.php';</script>";
            exit; // Dừng chương trình sau khi chuyển hướng
        } else {
            // Hiển thị lỗi nếu có
            echo "Xóa thất bại: " . mysqli_error($conn);
        }
    } else {
        echo "Không có tham số MaHS được cung cấp.";
    }
?>
