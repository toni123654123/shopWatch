<?php
require 'inc/header.php';
?>

<main class="l-main">

    <section class="background">
        <div class="background__img"></div>
    </section>
    <!-- ========== PRODUCT =========== -->
    <section class="products">
        <h2 class="products__title">Chi tiết sản phẩm</h2>
        <form action="">
            <div class="products__container bd-grid">
                <div class="products__box">
                    <img src="upload/<?= $data['proImage']; ?>" alt="">
                    <i class='bx bx-heart products__icon'></i>
                </div>

                <div class="products__data">
                    <h1 class="products__name"><?= $data['proName']; ?></h1>

                    <label for="">Số lượng: </label>
                    <input type="hidden" name="c" value="product">
                    <input type="hidden" name="a" value="item">
                    <input type="hidden" name="ids" value="<?= $data['proId']; ?>">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" max="10" min="1" name="qty" type="number" value=<?= isset($_GET['qty']) ?  $_GET['qty'] :  '1' ?>>
                    <input class="plus is-form" type="button" value="+">

                    <p class="products__price">Giá: $ <?= $data['proPrice']; ?></p>
                    <div style="margin-top: 20px;">
                        <button type="submit" class="button">Thêm vào giỏ</button>
                        <?php
                        if (!empty($_SESSION['user'])) { ?>
                            <a href="index.php?c=product&a=item&Id=<?php echo $data['proId']; ?>" class="button">
                                Yêu thích
                            </a>
                        <?php } else { ?>
                            <a href="#" class="button" onclick='showErrorToast("Bạn cần phải đăng nhập để yêu thích sản phẩm !")'>
                                Yêu thích
                            </a>
                        <?php } ?>
                    </div>
                    <div class="products__desc" style="margin-top: 35px;"><?= $data['proDetail']; ?>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <section class="featured">
        <h4 class="__title bd-grid" style="text-align: left;">Sản phẩm tương tự</h4>
        <div class="featured__container bd-grid">
            <?php
            foreach ($similar as $val) {
                if ($data['proId'] != $val['proId']) {
            ?>
                    <div class="featured__product">

                        <div class="featured__box">
                            <img src="upload/<?php echo $val['proImage'];
                                                ?>" alt="">
                            <i class='bx bx-heart featured__icon'></i>
                            <a href="index.php?c=product&a=addcart&id=<?php echo $val['proId'];
                                                                        ?>" class="button">Add to cart</a>
                        </div>

                        <div class="featured__data">
                            <a href="index.php?c=product&a=item&id=<?php echo $val['proId'];
                                                                    ?>" class="featured__name"><?php echo $val['proName'];
                                                                                                ?></a>
                            <span class="featured__price">$ <?php echo $val['proPrice'];
                                                            ?></span>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </section>


    <!-- ========== BACKGROUND =========== -->

    <?php
    require 'inc/footer.php';
    ?>
    </body>
    <script src="/assets/js/jquery.min.js"></script>
    <script>
        $("input.input-qty").each(function() {
            var $this = $(this),
                qty = $this.parent().find(".is-form"),
                min = Number($this.attr("min")),
                max = Number($this.attr("max"));
            if (min == 0) {
                var d = 0;
            } else d = min;
            $(qty).on("click", function() {
                if ($(this).hasClass("minus")) {
                    if (d > min) d += -1;
                } else if ($(this).hasClass("plus")) {
                    var x = Number($this.val()) + 1;
                    if (x <= max) d += 1;
                }
                $this.attr("value", d).val(d);
            });
        });

        function showError() {
            $(".error__msg").removeClass("d-none");
        }
    </script>

    </html>