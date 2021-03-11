<?php
require 'inc/header.php';
?>

<main class="l-main">

    <section class="background">
        <div class="background__img"></div>
    </section>
    <!-- ========== PRODUCT =========== -->
    <section class="cart">
        <h2 class="cart__title">Giỏ Hàng</h2>

        <p class="error__msg d-none">Giỏ hàng của bạn hiện chưa có sản phẩm. <br /> Vui lòng thêm sản phẩm để mua hàng !!!</p>

        <div class="cart__container bd-grid">
            <table class="cart__table">
                <thead>
                    <th class="cart__head"></th>
                    <th class="cart__head"></th>
                    <th class="cart__head">Sản phẩm</th>
                    <th class="cart__head">Giá</th>
                    <th class="cart__head">Số lượng</th>
                    <th class="cart__head">Thành tiền</th>
                </thead>
                <?php
                $total = [];
                ?>

                <tbody>
                    <?php
                    if (!empty($cart)) {
                        foreach ($cart as $val) {
                    ?>
                            <tr>
                                <td class="cart__item text-center">
                                    <a href="index.php?c=cart&a=del&id=<?= $val['proId']; ?>" class="cart__icon"><i class='bx bx-x-circle'></i></a>
                                </td>
                                <td class="cart__item">
                                    <img src="upload/<?php echo $val['proImage']; ?>" alt="">
                                </td>
                                <td class="cart__item">
                                    <span><?php echo $val['proName']; ?></span>
                                </td>
                                <td class="cart__item cart__price">$ <?php echo $val['proPrice']; ?>.00</td>
                                <td class="cart__item">
                                    <div class="cart__added">
                                        <form action="">
                                            <input type="hidden" name="c" value="cart">
                                            <input type="hidden" name="a" value="update">
                                            <input type="hidden" name="id" value="<?= $val['proId']; ?>">
                                            <input class="minus is-form" type="button" value="-">
                                            <input aria-label="quantity" class="input-qty" max="10" min="1" name="qty" type="number" value="<?php echo $val['quantity']; ?>">
                                            <input class="plus is-form" type="button" value="+">
                                            <button type="submit" class="cart__button">Cập nhật</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart__item cart__price">$
                                    <?php
                                    echo $total_item =  $val['proPrice'] * $val['quantity'];
                                    $total[] = $total_item;
                                    ?>.00
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6" class="text-center cart__item "> Không có sản phẩm nào trong giỏ hàng !!! </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <th colspan="6" class="cart__foot cart__code">
                        <input type="text" placeholder="Nhập mã giảm giá">
                        <button class="cart__button">Áp dụng</button>
                    </th>
                </tfoot>
            </table>


            <table class="cart__table">
                <thead>
                    <th class="cart__head" colspan="2" id="total">Thanh toán</th>
                </thead>
                <tbody>
                    <tr>
                        <th class="cart__item">
                            Tổng tiền
                        </th>
                        <td class="cart__item cart__price">
                            $ <?php echo array_sum($total); ?>.00
                        </td>
                    </tr>
                    <tr>
                        <th class="cart__item">
                            Thành tiền
                        </th>
                        <td class="cart__item cart__price">
                            $ <?php echo array_sum($total); ?>.00
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <td colspan="2" class="cart__foot cart__order">
                        <?php
                        if (!empty($cart)) { ?>
                            <a href="index.php?c=order" class="cart__button">Mua hàng</a>
                        <?php } else { ?>
                            <a href="#" class="cart__button" onclick='showErrorToast("Giỏ hàng của bạn hiện chưa có sản phẩm. <br /> Vui lòng thêm sản phẩm để mua hàng !!!")'>Mua hàng</a>
                        <?php }
                        ?>
                    </td>
                </tfoot>
            </table>
        </div>


    </section>

    <!-- ========== BACKGROUND =========== -->


    <?php
    require 'inc/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
    </body>

    </html>