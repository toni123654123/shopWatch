<?php include('admin/includes/header.php'); ?>
<?php
if (isset($msg)) {
    if ($msg == "success") { ?>
        <script>
            showSuccessToast("Xóa đơn thành công!");
            setInterval(() => {
                location.href = "index.php?c=admin&a=order";
            }, 1000);
        </script>
    <?php } else { ?>
        <script>
            showErrorToast("Xóa đơn thất bại!");
        </script>
<?php    }
}
?>
<!--heder end here-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Quản lý đơn hàng</li>
</ol>
<div class="agile-grids">
    <!-- tables -->
    <div class="agile-tables">
        <div class="w3l-table-info">
            <h2>Quản lý đơn hàng</h2>
            <div class="filter" style="display:flex; align-items:center;">
                <form action="" method="get" class="featured__form">
                    <input type="hidden" name="c" value="admin">
                    <input type="hidden" name="a" value="order">
                    <input type="text" class="featured__form--srch" name="donid" placeholder="Tìm kiếm đơn Id">
                    <button type="submit" class="featured__form--btn"><i class="fa fa-search"></i></button>
                </form>
                <form action="" method="get" class="featured__form">
                    <input type="hidden" name="c" value="admin">
                    <input type="hidden" name="a" value="order">
                    <input type="text" class="featured__form--srch" name="user" placeholder="Tìm kiếm khách hàng">
                    <button type="submit" class="featured__form--btn"><i class="fa fa-search"></i></button>
                </form>
                <form action="" method="get">
                    <div class="form-grouop">
                        <input type="hidden" name="c" value="admin">
                        <input type="hidden" name="a" value="order">
                        <select name="status" id="" style="padding: .2rem; font-size: .8rem; margin-left: 10px;" onchange="this.form.submit();">
                            <option value="">-- Trạng thái -- </option>
                            <option value="">All </option>
                            <option value="0" <?= ((isset($_GET['status'])) && $_GET['status'] == "0") ? 'selected' : ""
                                                ?>>Chờ xử lý</option>
                            <option value="1" <?= (isset($_GET['status']) && $_GET['status'] == "1") ? 'selected' : ""
                                                ?>>Đang giao hàng</option>
                            <option value="2" <?= (isset($_GET['status']) && $_GET['status'] == "2") ? 'selected' : ""
                                                ?>>Hoàn thành </option>
                            <option value="-1" <?= (isset($_GET['status']) && $_GET['status'] == "-1") ? 'selected' : ""
                                                ?>>Hủy đơn </option>
                        </select>
                    </div>
                </form>
            </div>
            <table id="table">
                <thead>
                    <tr>
                        <th>Id Đơn</th>
                        <th>Tài khoản</th>
                        <th>Họ Tên</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ Ship</th>
                        <th>Email</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng Thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <?php
                foreach ($data as $value) {
                    $user = $db->getId("user", "userid", $value['userid']);
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $value['order_id']; ?></td>
                            <td><?php echo $user['user']; ?></td>
                            <td><?php echo $value['orderName']; ?></td>
                            <td><?php echo $value['orderPhone']; ?></td>
                            <td><?php echo $value['orderShip']; ?></td>
                            <td><?php echo $value['orderEmail']; ?></td>
                            <td>$ <?php echo $value['orderTotal']; ?>.00</td>
                            <td>

                                <?php
                                if ($value['Payments'] == "0") { ?>
                                    <span class="">
                                        Thanh toán khi nhận hàng
                                    </span>

                                <?php  } ?>

                                <?php
                                if ($value['Payments'] == "1") { ?>

                                    <span>
                                        Thanh toán online
                                    </span>

                                <?php  } ?>



                            </td>
                            <td class="status">
                                <div class="dropdown">
                                    <?php
                                    if ($value['orderStatus'] == "-1") { ?>
                                        <a href="#" class="btn btn-danger">
                                            <span class="status_text text-white">
                                                Hủy Đơn
                                            </span>
                                        </a>
                                    <?php  } ?>
                                    <?php
                                    if ($value['orderStatus'] == "0") { ?>
                                        <a href="index.php?c=admin&a=check&status=1&id=<?php echo $value['order_id']; ?>" class="btn btn-warning">
                                            <span class="status_text text-white">
                                                Chờ xử lý
                                            </span>
                                        </a>
                                    <?php  } ?>

                                    <?php
                                    if ($value['orderStatus'] == "1") { ?>
                                        <a href="index.php?c=admin&a=check&status=2&id=<?php echo $value['order_id']; ?>" class="btn btn-primary">
                                            <span class="status_text text-white">
                                                Đang giao hàng
                                            </span>
                                        </a>
                                    <?php  } ?>

                                    <?php
                                    if ($value['orderStatus'] == "2") { ?>
                                        <button class="btn btn-success">
                                            <span class="status_text text-white">
                                                Hoàn thành
                                            </span>
                                        </button>
                                    <?php  } ?>
                                </div>
                            </td>
                            <td>
                                <a href="index.php?c=admin&a=detail&id=<?php echo $value['order_id']; ?>">
                                    <i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-edit text-primary"></i>
                                </a>
                                <?php
                                if ($value['orderStatus'] == "-1") { ?>
                                    <a href="#" onclick='showErrorToast("Đơn hàng đã bị hủy !!!")'>
                                        <i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-ban text-danger"></i>
                                    </a>
                                <?php  } else { ?>
                                    <a href="index.php?c=admin&a=check&status=-1&id=<?php echo $value['order_id']; ?>" onclick="confirmProduct();">
                                        <i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-ban text-danger"></i>
                                    </a>
                                <?php } ?>
                            </td>
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
        function confirmProduct() {
            if (window.confirm("Bạn có chắc chắn muốn hủy đơn này!?")) {
                window.location.href = "index.php?c=admin&a=product";
            }
        }
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