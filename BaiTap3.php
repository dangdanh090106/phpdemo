<?php
$errors = [];
$success_message = "";
$fullname = $email = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($fullname)) {
        $errors['fullname'] = "Họ tên không được để trống.";
    }

    if (empty($email)) {
        $errors['email'] = "Email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Định dạng email không hợp lệ.";
    }

 
    if (empty($password)) {
        $errors['password'] = "Mật khẩu không được để trống.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự.";
    }


    if (empty($errors)) {
        $success_message = "Đăng ký thành công!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 3: Form đăng ký cơ bản</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .error { color: red; font-size: 14px; }
        .success { color: green; font-weight: bold; margin-bottom: 15px; }
        .result-box { background: #f4f4f4; padding: 15px; border-left: 5px solid #007bff; margin-top: 20px; }
    </style>
</head>
<body>

    <h2>Form Đăng Ký</h2>

    <?php if (!empty($success_message)): ?>
        <div class="success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="fullname">Họ tên:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>">
            <?php if (isset($errors['fullname'])): ?>
                <div class="error"><?php echo $errors['fullname']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password">
            <?php if (isset($errors['password'])): ?>
                <div class="error"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
        </div>

        <button type="submit">Đăng ký</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
        <div class="result-box">
            <h3>Thông tin đăng ký của bạn:</h3>
            <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($fullname); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        </div>
    <?php endif; ?>

</body>
</html>