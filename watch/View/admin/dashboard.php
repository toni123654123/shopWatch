<?php include('admin/includes/header.php'); ?>
<!--header end here-->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
</ol>
<!--four-grids here-->
<div class="four-grids">
    <div class="col-md-3 four-grid">
        <div class="four-agileits">
            <div class="icon">
                <i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Sản phẩm</h3>
                <h4>
                    <?= count($product) ?>
                </h4>
            </div>
        </div>
    </div>

    <div class="col-md-3 four-grid">
        <div class="four-w3ls bg-warning">
            <div class="icon">
                <i class="glyphicon glyphicon-th-large" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Danh mục</h3>
                <h4><?= count($cate) ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3 four-grid">
        <div class="four-wthree">
            <div class="icon">
                <i class="glyphicon glyphicon-th" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Thành viên</h3>
                <h4><?= count($user) ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3 four-grid">
        <div class="four-agileinfo">
            <div class="icon">
                <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Đơn hàng</h3>
                <h4><?= count($order) ?></h4>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>


<div class="four-grids">
    <div class="col-md-3 four-grid">
        <div class="four-w3ls bg-info">
            <div class="icon">
                <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Các vấn đề</h3>
                <h4>0</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3 four-grid">
        <div class="four-w3ls">
            <div class="icon">
                <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Tin Tức</h3>
                <h4>0</h4>
            </div>

        </div>
    </div>
    <div class="col-md-3 four-grid">
        <div class="four-w3ls bg-danger">
            <div class="icon">
                <i class="glyphicon glyphicon-usd" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Doanh Thu Tháng</h3>
                <h4>
                    0
                </h4>

            </div>

        </div>
    </div>
    <div class="col-md-3 four-grid">
        <div class="four-w3ls bg-success">
            <div class="icon">
                <i class="glyphicon glyphicon-signal" aria-hidden="true"></i>
            </div>
            <div class="four-text">
                <h3>Tổng Doanh Thu</h3>

                <h4>
                    0
                </h4>

            </div>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!--//four-grids here-->


<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('admin/includes/footer.php'); ?>
</div>
</div>

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
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth: true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity: 0.85,
            data: [{
                    period: '2014 Q1',
                    iphone: 2668,
                    ipad: null,
                    itouch: 2649
                },
                {
                    period: '2014 Q2',
                    iphone: 15780,
                    ipad: 13799,
                    itouch: 12051
                },
                {
                    period: '2014 Q3',
                    iphone: 12920,
                    ipad: 10975,
                    itouch: 9910
                },
                {
                    period: '2014 Q4',
                    iphone: 8770,
                    ipad: 6600,
                    itouch: 6695
                },
                {
                    period: '2015 Q1',
                    iphone: 10820,
                    ipad: 10924,
                    itouch: 12300
                },
                {
                    period: '2015 Q2',
                    iphone: 9680,
                    ipad: 9010,
                    itouch: 7891
                },
                {
                    period: '2015 Q3',
                    iphone: 4830,
                    ipad: 3805,
                    itouch: 1598
                },
                {
                    period: '2015 Q4',
                    iphone: 15083,
                    ipad: 8977,
                    itouch: 5185
                },
                {
                    period: '2016 Q1',
                    iphone: 10697,
                    ipad: 4470,
                    itouch: 2038
                },
                {
                    period: '2016 Q2',
                    iphone: 8442,
                    ipad: 5723,
                    itouch: 1801
                }
            ],
            lineColors: ['#ff4a43', '#a2d200', '#22beef'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>
</body>

</html>