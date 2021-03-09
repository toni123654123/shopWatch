<?php include('admin/includes/header.php'); ?>
<!--heder end here-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Quản lý thắc mắc</li>
</ol>
<div class="agile-grids">
    <div class="agile-tables">
        <div class="w3l-table-info">
            <h2>Quản lý thắc mắc</h2>
            <table id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên khách hàng</th>
                        <th width="35%">Nội Dung </th>
                        <th>Chức năng </th>
                    </tr>
                </thead>
                <?php
                $stt = 1;
                foreach ($cmt as $value) {
                    $product = $db->getId("product", "proId", $value['proId']);
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $product['proName']; ?> </td>
                            <td><img src="upload/<?php echo $product['proImage']; ?>" alt="" width="80px"></td>
                            <td><?php echo $value['cmt_name']; ?></td>
                            <td><?php echo $value['cmt_text']; ?></td>
                            <td>
                                <a href="index.php?c=admin&a=del_cmt&id=<?php echo $value['cmt_id'] ?>">
                                    <i style="font-size: 1.1rem; line-height: 20px; padding: 5px;" class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php $stt++;
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