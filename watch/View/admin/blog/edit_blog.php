<?php include('admin/includes/header.php'); ?>
<!--heder end here-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?c=admin">Home</a><i class="fa fa-angle-right"></i><a href="index.php?c=admin&a=blog">Blog</a><i class="fa fa-angle-right"></i>Cập nhật</li>
</ol>
<!--grid-->
<div class="grid-form">

    <!---->
    <div class="grid-form1">
        <h3>Cập nhật tin tức</h3>
        <?php
        if (isset($msg)) {
            echo "<p style='color: red; text-align: center;'>" . $msg . "</p>";
        }
        ?>
        <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tên tiêu đề</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" name="blogTitle" id="packagetype" placeholder=" Tên sản phẩm" value="<?= $dataId['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Nội dung</label>
                        <div class="col-sm-8">
                            <textarea class="form-control ckeditor" name="blogContent" id="summernote" rows="10" cols="50" placeholder=""><?= $dataId['content']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-8">
                            <img src="upload/<?= $dataId['image']  ?>" alt="" width="80px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh mới</label>
                        <div class="col-sm-8">
                            <input type="file" name="file" id="packageimage">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tác giả</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" name="blogAuthor" id="packageprice" placeholder=" Nhập giá tiền" value="<?= $dataId['author']  ?>">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button type="submit" name="editBlog" class="btn-primary btn">Cập nhật tin tức</button>
                            <button type="button" name="" class="btn-inverse btn" onclick="confirmProduct()">Quay lại</button>
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
    function confirmProduct() {
        if (window.confirm("Bạn có chắc chắn muốn thoát!?")) {
            window.location.href = "index.php?c=admin&a=product";
        }
    }

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