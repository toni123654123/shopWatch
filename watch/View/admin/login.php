<!DOCTYPE HTML>
<html>

<head>
	<title>TMS | Admin Sign in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Bootstrap Core CSS -->
	<link href="admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="admin/css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="admin/css/morris.css" type="text/css" />
	<!-- Graph CSS -->
	<link href="admin/css/font-awesome.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="admin/js/jquery-2.1.4.min.js"></script>
	<!-- tables -->
	<link rel="stylesheet" type="text/css" href="admin/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="admin/css/basictable.css" />
	<script type="text/javascript" src="admin/js/jquery.basictable.min.js"></script>
	<!-- //jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="admin/css/icon-font.min.css" type='text/css' />
	<link rel="stylesheet" href="admin/css/summernote-bs3.css">
	<link rel="stylesheet" href="admin/css/summernote.css">
	<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/ckeditor/ckeditor.js"></script>
	<script src="admin/js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="admin/js/bootstrap.min.js"></script>
	<!-- /Bootstrap Core JavaScript -->
	<!-- morris JavaScript -->
	<script src="admin/js/raphael-min.js"></script>
	<script src="admin/js/morris.js"></script>
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

</head>

<body>
	<div class="main-wthree">
		<div class="container">
			<div class="sin-w3-agile">
				<h2>Đăng Nhập Quản Trị</h2>
				<p>
					<?php
					if (isset($msg)) {
						echo  $msg;
					}
					?>
				</p>
				<form action="" method="POST">
					<div class="username">
						<span class="username">Tài Khoản:</span>
						<input type="text" name="user" class="name" placeholder="">
						<div class="clearfix"></div>
					</div>
					<div class="password-agileits">
						<span class="username">Mật Khẩu:</span>
						<input type="password" name="password" class="password" placeholder="">
						<div class="clearfix"></div>
					</div>

					<div class="login-w3">
						<input type="submit" class="login" name="login" value="Đăng Nhập">
					</div>
					<div class="clearfix"></div>
				</form>
				<div class="back">
					<a href="index.php">Trở về Trang chủ</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>