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
                <h1 class="signup-heading">Đăng nhập</h1>
                <div style="color:red; margin-bottom: 5px;">
                    <?php
                    if (isset($error)) {
                        echo "<p style='color: red; text-align: center;'>" . $error . "</p>";
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

                    <div class="form-group signup-term">
                        By clicking you agree with our <a href="index.php?c=login&a=signup" class="signup-term-link">Term of use.</a>
                    </div>
                    <button type="submit" class="btn btn--gradient" name="signin" id="signin">Đăng Nhập</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>