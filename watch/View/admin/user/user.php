<?php include('admin/includes/header.php'); ?>
<?php
if (isset($msg)) {
	if ($msg == "success") { ?>
		<script>
			showSuccessToast("Xóa user thành công!");
			setInterval(() => {
				location.href = "index.php?c=admin&a=user";
			}, 1000);
		</script>
	<?php } else { ?>
		<script>
			showErrorToast("Xóa user thất bại!");
		</script>
<?php	}
}
?>
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Thành viên</li>
</ol>
<div class="agile-grids">
	<!-- tables -->

	<div class="agile-tables">
		<div class="w3l-table-info">
			<div class="action" style="display:flex; align-items:center; justify-content:space-between;">
				<?php
				if (isset($_SESSION['data'])) {
					if ($_SESSION['data'][0]['adRole'] == "0" || $_SESSION['data'][0]['adRole'] == "1") { ?>
						<a href="index.php?c=admin&a=add_user" class="btn btn-primary btn_add"><i class="fa fa-plus "></i> Thêm</a>
					<?php	} else { ?>
						<a href="index.php?c=admin&a=add_user" onclick='showErrorToast("Bạn không có quyền thêm, sửa xóa !!!")' class="btn btn-primary btn_add"><i class="fa fa-plus "></i> Thêm</a>
				<?php }
				} ?>

				<div class="filter" style="display:flex; align-items:center; justify-content:space-around;">
					<form action="" method="get" class="featured__form">
						<input type="hidden" name="c" value="admin">
						<input type="hidden" name="a" value="user">
						<input type="text" class="featured__form--srch" name="q" placeholder="Tìm kiếm....">
						<button type="submit" class="featured__form--btn"><i class="fa fa-search"></i></button>
					</form>
					<form action="" method="get">
						<div class="form-grouop">
							<input type="hidden" name="c" value="admin">
							<input type="hidden" name="a" value="user">
							<select name="role" id="" style="padding: .2rem; font-size: .8rem; margin-left: 10px;" onchange="this.form.submit();">
								<option value="">-- Chức vụ -- </option>
								<option value="">All </option>
								<option value="0" <?= ((isset($_GET['price'])) && $_GET['price'] == "10") ? 'selected' : ""
													?>>Super Admin</option>
								<option value="1" <?= (isset($_GET['price']) && $_GET['price'] == "500") ? 'selected' : ""
													?>>Admin</option>
								<option value="2" <?= (isset($_GET['price']) && $_GET['price'] == "1000") ? 'selected' : ""
													?>>User</option>
							</select>
						</div>
					</form>
				</div>
			</div>
			<table id="table">
				<thead>
					<tr>
						<th>#</th>
						<th width="10%">Tài khoản</th>
						<th>Tên thành viên</th>
						<th>Số điện thoại</th>
						<th>Email</th>
						<th>Chức vụ</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$stt = 1;
					foreach ($data as $value) {

					?>
						<tr>
							<td><?php echo $stt++; ?></td>
							<td><?php echo $value['adUser']; ?></td>
							<td><?php echo $value['adName']; ?></td>
							<td><?php echo $value['adPhone']; ?></td>
							<td><?php echo $value['adEmail']; ?></td>
							<td>
								<?php
								if ($value['adRole'] == "0") {
									echo "Super Admin";
								} else if ($value['adRole'] == "1") {
									echo "Admin";
								} else {
									echo "User";
								}
								?>
							</td>
							<?php
							if (isset($_SESSION['data'])) {
								if ($_SESSION['data'][0]['adRole'] == "0" || $_SESSION['data'][0]['adRole'] == "1") { ?>
									<td>
										<a href="index.php?c=admin&a=reset&id=<?php echo $value['admin_id'] ?>">
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-edit text-primary"></i>
										</a>
										<a href="index.php?c=admin&a=del_user&id=<?php echo $value['admin_id'] ?>">
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-trash text-danger"></i>
										</a>
									</td>
								<?php	} else { ?>
									<td>
										<a href="#" onclick='showErrorToast("Bạn không có quyền thêm, sửa xóa !!!")'>
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-edit text-primary"></i>
										</a>
										<a href="#" onclick='showErrorToast("Bạn không có quyền thêm, sửa xóa !!!")'>
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-trash text-danger"></i>
										</a>
									</td>
							<?php }
							} ?>
						</tr>
					<?php
					}

					?>
				</tbody>
			</table>
		</div>
		</table>


	</div>
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
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->

</body>

</html>