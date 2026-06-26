<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Profile App</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        .form-container, .profile-card { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px; }
        h2 { margin-top: 0; color: #333; border-bottom: 2px solid #3498db; padding-bottom: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], input[type="email"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #2980b9; }
        .error { color: #e74c3c; margin-bottom: 15px; font-size: 14px; list-style-type: none; padding-left: 0; }
        .error li { background: #fde8e8; border-left: 4px solid #e74c3c; padding: 8px; margin-bottom: 5px; }
        .skill-tag { display: inline-block; background: #e1f5fe; color: #0288d1; padding: 5px 10px; margin: 4px; border-radius: 20px; font-size: 14px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <?php
   
    $name = $email = $major = $skills_str = "";
    $errors = [];
    $is_submitted = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
      
        if (empty(trim($_POST["name"]))) {
            $errors[] = "Vui lòng nhập họ tên.";
        } else {
            $name = trim($_POST["name"]);
        }

        if (empty(trim($_POST["email"]))) {
            $errors[] = "Vui lòng nhập email.";
        } else {
            $email = trim($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Định dạng email không hợp lệ.";
            }
        }

        if (empty(trim($_POST["major"]))) {
            $errors[] = "Vui lòng nhập ngành học.";
        } else {
            $major = trim($_POST["major"]);
        }


        if (empty(trim($_POST["skills"]))) {
            $errors[] = "Vui lòng nhập ít nhất một kỹ năng.";
        } else {
            $skills_str = trim($_POST["skills"]);
        }


        if (empty($errors)) {
            $is_submitted = true;
        }
    }
    ?>

    <div class="form-container">
        <h2>Nhập Thông Tin Profile</h2>
        
        <?php if (!empty($errors)): ?>
            <ul class="error">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Ví dụ: Nguyễn Văn A">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Ví dụ: name@example.com">
            </div>
            
            <div class="form-group">
                <label for="major">Ngành học:</label>
                <input type="text" id="major" name="major" value="<?php echo htmlspecialchars($major); ?>" placeholder="Ví dụ: Công nghệ thông tin">
            </div>
            
            <div class="form-group">
                <label for="skills">Kỹ năng (phân tách bằng dấu phẩy):</label>
                <input type="text" id="skills" name="skills" value="<?php echo htmlspecialchars($skills_str); ?>" placeholder="Ví dụ: PHP, HTML, CSS, JavaScript">
            </div>
            
            <button type="submit">Tạo Profile Card</button>
        </form>
    </div>

    <?php if ($is_submitted): ?>
        <div class="profile-card">
            <h2>🪪 PROFILE CARD</h2>
            <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Ngành học:</strong> <?php echo htmlspecialchars($major); ?></p>
            <p><strong>Danh sách kỹ năng:</strong></p>
            <div>
                <?php 
               
                $skills_array = explode(',', $skills_str); 
                
               
                foreach ($skills_array as $skill) {
                    $cleaned_skill = trim($skill); 
                    if ($cleaned_skill !== "") { 
                        echo '<span class="skill-tag">' . htmlspecialchars($cleaned_skill) . '</span>';
                    }
                }
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>