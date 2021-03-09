<?php

if (empty($_SESSION['adUser'])) {
	header('location:index.php?c=admin&a=login');
}

?>
<!DOCTYPE HTML>
<html>

<head>
	<title></title>
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
	<script src="Toast/toast.js"></script>
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
	<?php
	require 'Toast/index.php'; ?>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
						<h1><a href="index.php?c=admin">HỆ THỐNG QUẢN LÝ SHOP WATCH</a></h1>
					</div>
					<div class="profile_details w3l">
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">
										<span class="prfil-img"><img src="admin/images/User-icon.png" alt=""> </span>
										<div class="user-name">
											<p>Chào mừng</p>
											<span><?= $_SESSION['adUser'] ?></span>
										</div>
										<i class="fa fa-angle-down"></i>
										<i class="fa fa-angle-up"></i>
										<div class="clearfix"></div>
									</div>
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="change-password.php"><i class="fa fa-user"></i>Đổi mật khẩu</a> </li>
									<li> <a href="index.php?c=admin&a=logout"><i class="fa fa-sign-out"></i> Đăng xuất</a> </li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="view_web w3l">
						<a href="index.php" class="link_website"><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>Shop</a>
					</div>

					<div class="clearfix"> </div>

				</div>