<?php
$ho_ten = "Đặng Công Danh";
$tuoi = 20;
$nganh_hoc = "Công nghệ thông tin";
$email = "dangdanh0901@gmail.com";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chào sinh viên</title>
</head>
<body>

    <div class="card">
        <h2>Thông Tin Sinh Viên</h2>
        
        <p>Họ tên: <?php echo $ho_ten; ?></p>
        <p>Tuổi: <?php echo $tuoi; ?></p>
        <p>Ngành học: <?php echo $nganh_hoc; ?></p>
        <p>Email: <?php echo $email; ?></p>

        <?php 
        if ($tuoi >= 18) {
            echo "<p><strong>Đủ tuổi học đại học</strong></p>";
        } 
        ?>
    </div>

</body>
</html>