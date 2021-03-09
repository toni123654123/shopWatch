<?php include('admin/includes/header.php'); ?>
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.html?c=admin">Home</a><i class="fa fa-angle-right"></i><a href="index.php?c=admin&a=order">Đơn hàng</a><i class="fa fa-angle-right"></i>Chi tiết</li>
</ol>
<!--grid-->
<div class="grid-form">

	<!---->
	<div class="grid-form1">
		<h3>Thông tin khách hàng</h3>
		<div class="tab-content row" style="margin-left: 100px;">
			<div class="tab-pane active col-sm-6" id="horizontal-form">
				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Tài khoản: </div>
					<div class="" style="margin-left: 25px;">
						<span>
							<?= $userId['user']; ?>
						</span>
					</div>
				</div>
				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Họ và tên: </div>
					<div class="" style="margin-left: 25px;">
						<span>
							<?= $dataId['orderName']; ?>
						</span>
					</div>
				</div>
				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Số điện thoại:</div>
					<div class="" style="margin-left: 25px;">
						<span>
							<?= $dataId['orderPhone']; ?>
						</span>
					</div>
				</div>
				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Địa chỉ nhận hàng:</div>
					<div class="" style="margin-left: 25px;">
						<span>
							<?= $dataId['orderShip']; ?>
						</span>
					</div>
				</div>
			</div>
			<div class="tab-pane active col-sm-6" id="horizontal-form">
				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Email: </div>
					<div class="" style="margin-left: 25px;">
						<span>
							<?= $dataId['orderEmail']; ?>
						</span>
					</div>
				</div>
				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Tổng tiền thanh toán: </div>
					<div class="" style="margin-left: 25px;">
						<span>
							$ <?= $dataId['orderTotal']; ?>.00
						</span>
					</div>
				</div>
				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Hình thức thanh toán: </div>
					<div class="" style="margin-left: 25px;">

						<?= $dataId['Payments'] == "0" ? "<span >Thanh toán khi nhận hàng</span>" : ""; ?>
						<?= $dataId['Payments'] == "1" ? "<span>Thanh toán Online</span>" : ""; ?>


					</div>
				</div>

				<div class="form-group" style="display:flex;align-items:center;">
					<div class="text-mute">Trạng thái đơn hàng: </div>
					<div class="" style="margin-left: 25px;">
						<?= $dataId['orderStatus'] == "-1" ? "<span class='btn btn-danger'>Hủy đơn</span>" : ""; ?>
						<?= $dataId['orderStatus'] == "0" ? "<span class='btn btn-warning'>Chờ xử lý</span>" : ""; ?>
						<?= $dataId['orderStatus'] == "1" ? "<span class='btn btn-primary'>Đang giao hàng</span>" : ""; ?>
						<?= $dataId['orderStatus'] == "2" ? "<span class='btn btn-success'>Hoàn Thành</span>" : ""; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="agile-tables">
		<div class="w3l-table-info">
			<h2>Chi tiết đơn hàng</h2>
			<table id="table">
				<thead>
					<tr>
						<th>Id Đơn</th>
						<th>Id Sản Phẩm</th>
						<th>Tên Sản Phẩm</th>
						<th>Hình Ảnh</th>
						<th>Giá Tiền</th>
						<th>Số Lượng</th>
						<th>Tổng tiền</th>
					</tr>
				</thead>
				<?php
				foreach ($data as $value) { ?>
					<tbody>
						<tr>
							<td><?php echo $value['order_id']; ?></td>
							<td><?php echo $value['proId']; ?></td>
							<td><?php echo $value['ordetail_Name']; ?></td>
							<td><img src="upload/<?php echo $value['ordetail_Image']; ?>" alt="" width="80px"></td>
							<td>$ <?php echo $value['ordetail_Price']; ?>.00</td>
							<td><?php echo $value['ordetail_Qty']; ?></td>
							<td>$ <?php echo $value['ordetail_Total']; ?>.00</td>
						</tr>
					</tbody>
				<?php
				} ?>
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
</body>

</html>