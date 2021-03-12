<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Watch</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="admin/css/font-awesome.css" rel="stylesheet">
    <script src="Toast/toast.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
</head>
<style>
    .toast {
        padding: 10px;
    }
</style>

<body>
    <?php
    require 'Toast/index.php'; ?>
    <!-- ======= HEADER ====== -->
    <header class="l-header" id="header">
        <nav class="nav bd-grid">
            <a href="index.php" class="nav__logo"><img src="assets/img/logo.png" alt=""></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="index.php?c=product" class="nav__link">Shop</a></li>
                    <li class="nav__item"><a href="index.php?c=history" class="nav__link">History</a></li>
                    <li class="nav__item"><a href="index.php?c=blog" class="nav__link">Blog</a></li>
                    <li class="nav__item"><a href="index.php?c=contact" class="nav__link">Contact</a></li>
                </ul>
            </div>

            <div>
                <?php
                if (!empty($_SESSION['user'])) { ?>
                    <div class="user">
                        <span>Tài khoản: <span><?php echo $_SESSION['user'];  ?></span></span>
                    </div>
                <?php } ?>

                <a href="index.php?c=heart" id="nav-cart">
                    <i class='bx bx-heart nav__cart'></i>
                    </i>
                    <span class="cart__num">
                        <?php
                        $number = [];
                        if (!empty($heart)) {
                            foreach ($heart as $val) {
                                $number[] = $val['quantity'];
                            };
                        }
                        $number == ""  ? $kq = "0" : $kq =  array_sum($number);
                        echo $kq;
                        ?>
                    </span>
                </a>

                <a href="index.php?c=cart" id="nav-cart">
                    <i class='bx bx-cart nav__cart'>
                    </i>
                    <span class="cart__num">
                        <?php
                        $number = [];
                        if (!empty($cart)) {
                            foreach ($cart as $val) {
                                $number[] = $val['quantity'];
                            };
                        }
                        $number == ""  ? $kq = "0" : $kq =  array_sum($number);
                        echo $kq;
                        ?>
                    </span>
                </a>

                <?php
                if (empty($_SESSION['user'])) {
                    echo '<a href="index.php?c=login"><i class="bx bx-user nav__login"></i></a>';
                } else {
                    echo "<a href='index.php?c=login&a=logout'> <i class='bx bx-log-out bx-rotate-180 nav__login'></i></a>";
                }
                ?>
                <i class='bx bx-menu nav__toggle' id="nav-toggle"></i>
            </div>
        </nav>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var path = window.location.href;
            var folerpath = path.split("/")[3];
            var folderpath = folerpath.split("&")[0];
            var pathname = "";

            $(".nav__menu a").each(function(index) {
                var menupath = $(this).attr("href");
                var menufolerpath = menupath.split("/")[0];
                if (folderpath == menufolerpath) {
                    $(this).addClass("active");
                    $(".nav__menu a[href='" + $(this).attr("href") + "']").addClass("active");
                    pathname = $(this).text();
                }
            });


            function titleadd(add = '') {
                var title = location.hostname.split(".")[0].toUpperCase();
                if (add != '') {
                    title = title + " | " + add;
                }
                document.title = title;
            }
            var query = (window.location.href + "?").split("?")[1];
            var result = query.split("=")[3];
            console.log(result);

            if (result == undefined) {
                titleadd(pathname);
            } else {
                titleadd(pathname + " > " + result);
            }

        });
    </script>