<?php include('admin/includes/header.php'); ?>
<?php
if (isset($msg)) {
	if ($msg == "success") { ?>
		<script>
			showSuccessToast("Xóa sản phẩm thành công!");
			setInterval(() => {
				location.href = "index.php?c=admin&a=blog";
			}, 1000);
		</script>
	<?php } else { ?>
		<script>
			showErrorToast("Xóa sản phẩm thất bại!");
		</script>
<?php	}
}
?>
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.php?c=admin">Home</a><i class="fa fa-angle-right"></i>Blog</li>
</ol>
<div class="agile-grids">
	<!-- tables -->

	<div class="agile-tables">
		<div class="w3l-table-info">
			<div class="action" style="display:flex; align-items:center; justify-content:space-between;">
				<?php
				if (isset($_SESSION['data'])) {
					if ($_SESSION['data'][0]['adRole'] == "0" || $_SESSION['data'][0]['adRole'] == "1") { ?>
						<a href="index.php?c=admin&a=add_blog" class="btn btn_add btn-primary"><i class="fa fa-plus "></i> Thêm</a>
					<?php	} else { ?>
						<a href="#" class="btn btn_add btn-primary" onclick='showErrorToast("Bạn không có quyền thêm, sửa xóa !!!")'><i class="fa fa-plus "></i> Thêm</a>
				<?php }
				} ?>
				<div class="filter" style="display:flex; align-items:center; justify-content:space-around;">
					<form action="" method="get" class="featured__form">
						<input type="hidden" name="c" value="admin">
						<input type="hidden" name="a" value="blog">
						<input type="text" class="featured__form--srch" name="q" placeholder="Tìm kiếm....">
						<button type="submit" class="featured__form--btn"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
			<table id="table">
				<thead>
					<tr>
						<th>#</th>
						<th width="15%">Tiêu đề</th>
						<th width="50%">Nội dung</th>
						<th>Hình ảnh</th>
						<th width="8%">Tác giả</th>
						<th>Thời gian</th>
						<th>Hành Động</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// $totalRecords = count($tour);
					// $totalPage = ceil($totalRecords / $page_item);
					$stt = 1;
					foreach ($data as $value) {
					?>
						<tr>
							<td><?php echo $stt++; ?></td>
							<td><?php echo $value['title']; ?></td>
							<td><?php echo $value['content']; ?></td>
							<td> <img src="upload/<?php echo $value['image']; ?>" alt="" width="80px" /></td>
							<td><?php echo $value['author']; ?></td>
							<td><?php echo $value['time']; ?></td>

							<?php
							if (isset($_SESSION['data'])) {
								if ($_SESSION['data'][0]['adRole'] == "0") { ?>
									<td>
										<a href="index.php?c=admin&a=edit_blog&id=<?php echo $value['blog_id'] ?>">
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-edit text-primary"></i>
										</a>
										<a href="index.php?c=admin&a=del_blog&id=<?php echo $value['blog_id'] ?>">
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-trash text-danger"></i>
										</a>
									</td>
								<?php	} else { ?>
									<td>
										<a href="#" onclick='showErrorToast("Bạn không có quyền sửa hoặc xóa !!!")'>
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-edit text-primary"></i>
										</a>
										<a href="#" onclick='showErrorToast("Bạn không có quyền sửa hoặc xóa !!!")'>
											<i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-trash text-danger"></i>
										</a>
									</td>
							<?php }
							} ?>

						</tr>
					<?php  } ?>
				</tbody>
			</table>

		</div>




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
</body>

</html>