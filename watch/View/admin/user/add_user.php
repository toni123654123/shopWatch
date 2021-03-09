<?php include('admin/includes/header.php'); ?>
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.html?c=admin">Home</a><i class="fa fa-angle-right"></i><a href="index.php?c=admin&a=user">Thành viên</a><i class="fa fa-angle-right"></i>Thêm</li>
</ol>
<!--grid-->
<div class="grid-form">

	<!---->
	<div class="grid-form1">
		<h3>Thêm thành viên</h3>
		<?php
		if (isset($msg)) {
			echo  $msg;
		}
		?>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tài khoản</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" name="adUser" id="packagename" placeholder="Username" required>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Mật khẩu</label>
						<div class="col-sm-8">
							<input type="password" class="form-control1" name="adPass" id="packagename" placeholder="Password" required>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên thành viên</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" name="adName" id="packagename" placeholder="Tên thành viên" required>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Số điện thoại</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" name="adPhone" id="packagename" placeholder="Số điện thoại" required>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control1" name="adEmail" id="packagename" placeholder="Email" required>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Chức vụ</label>
						<div class="col-sm-8">
							<select name="adRole" id="adRole">
								<option value="0">Super Admin</option>
								<option value="1">Admin</option>
								<option value="2">User</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<button type="submit" name="addUser" class="btn-primary btn">Thêm thành viên</button>

							<button type="reset" class="btn-inverse btn">Đặt lại</button>
						</div>
					</div>





			</div>

			</form>
			<div class="panel-footer">

			</div>
			</form>
		</div>
	</div>
	<!--//grid-->

	<!-- script-for sticky-nav -->
	<script>
		$(document).ready(function() {
			var navoffeset = $(".header-main").offset().top;
			$(window).scroll(function() {
				var scrollpos = $(window).scrollTop();
				if (scrollpos >= navoffeset) {
					$(".header-main").addClass("fixed");
				} else {
					$(".header-main").removeClass("fixed");
				}
			});

		});
	</script>
	<!-- /script-for sticky-nav -->
	<!--inner block start here-->
	<div class="inner-block">

	</div>
	<!--inner block end here-->
	<!--copy rights start here-->
	<?php include('admin/includes/footer.php'); ?>
	<!--COPY rights end here-->
</div>
</div>
<!--//content-inner-->
<!--/sidebar-menu-->
<?php include('admin/includes/sidebarmenu.php'); ?>
<div class="clearfix"></div>
</div>
<script>
	var toggle = true;

	$(".sidebar-icon").click(function() {
		if (toggle) {
			$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
			$("#menu span").css({
				"position": "absolute"
			});
		} else {
			$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
			setTimeout(function() {
				$("#menu span").css({
					"position": "relative"
				});
			}, 400);
		}

		toggle = !toggle;
	});
</script>
</body>

</html>