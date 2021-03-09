<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
    <div class="l-form">
        <div class="signup">
            <img src="../assets/img/gallery1.png" alt="" class="signup-image">
            <div class="signup-container">
                <h1 class="signup-heading">Đăng ký</h1>
                <div style=" margin-bottom: 5px;">
                    <?php
                    if (isset($error) && in_array('error', $error)) {
                        echo "<p style='color: red; text-align: center;'>Tài khoản hoặc email đã tồn tại !</p>";
                    }
                    ?>
                </div>
                <form class="signup-form" autocomplete="off" method="post">

                    <div class="form-group">
                        <label for="user" class="form-label">Tài khoản</label>
                        <input type="text" id="field-userName" class="form-input" placeholder="Ex: nguyenvana" name="user">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" id="field-password" class="form-input" placeholder="************" name="password">
                    </div>
                    <div class="form-group">
                        <label for="fname" class="form-label">Họ và tên</label>
                        <input type="text" id="field-userName" class="form-input" placeholder="Ex: Nguyễn Văn A" name="fname">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" id="field-password" class="form-input" placeholder="0123456789" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="field-userName" class="form-input" placeholder="Ex: nguyenvana@gmal.com" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" id="field-password" class="form-input" placeholder="Hà Nội" name="address">
                    </div>

                    <div class="form-group signup-term">
                        By clicking you agree with our <a href="#" class="signup-term-link">Term of use.</a>
                    </div>
                    <button type="submit" class="btn btn--gradient" name="signup" id="signup">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>