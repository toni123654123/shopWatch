<?php
require 'inc/header.php';
?>

<main class="l-main">

    <section class="background">
        <div class="background__img"></div>
    </section>
    <!-- ========== ORDER =========== -->
    <section class="cart">
        <h2 class="cart__title">Thông tin đặt hàng</h2>
        <?php
        if (isset($msg)) {
            echo  $msg;
        }
        ?>
        <div class="cart__container bd-grid">
            <table class="cart__table">
                <thead>
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
                                <td class="cart__item">
                                    <img src="upload/<?php echo $val['proImage']; ?>" alt="">
                                </td>
                                <td class="cart__item">
                                    <span><?php echo $val['proName']; ?></span>
                                </td>
                                <td class="cart__item cart__price">$ <?php echo $val['proPrice']; ?>.00</td>
                                <td class="cart__item">
                                    <?php echo $val['quantity']; ?>
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
                    <th colspan="4" class="cart__foot cart__code">
                        Tổng tiền
                    </th>
                    <th class="cart__foot cart__code cart__price">
                        $ <?php echo array_sum($total); ?>.00
                    </th>
                </tfoot>
            </table>
            <form action="" class="cart__info" method="post">
                <h3>Thông tin khách hàng</h3>
                <input type="hidden" name="orderTotal" value="<?= array_sum($total); ?>">
                <div class="form-group">
                    <label for="">Họ và tên:</label>
                    <input type="text" value="<?= !empty($info) ? $info['fullname'] : ""; ?>" name="orderName" placeholder="Nhập họ tên">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại:</label>
                    <input type="text" value="<?= !empty($info) ? $info['phone'] : ""; ?>" name="orderPhone" placeholder="Nhập số điện thoai">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ nhận hàng:</label>
                    <input type="text" value="" placeholder="Nhập địa chỉ nhận hàng" name="orderShip">
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" value="<?= !empty($info) ? $info['email'] : ""; ?>" name="orderEmail" placeholder="Nhập email">
                </div>

                <div class="">
                    <input type="radio" value="0" id="shipping" name="Payments" required=""><label for="shipping">Thanh toán khi nhận hàng </label>

                </div>
                <div>
                    <input type="radio" value="1" id="online" name="Payments" required=""><label for="online">Thanh toán Online</label>
                </div>

                <div style="margin-top: 10px;">
                    <button type="submit" class="cart__button" name="order">Đặt hàng</button>
                    <button type="submit" class="cart__button" name="c" value="cart">Trở lại</button>
                </div>
            </form>
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
    </script>
    </body>

    </html>