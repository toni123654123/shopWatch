<?php
require 'inc/header.php';
?>

<main class="l-main">
    <section class="background">
        <div class="background__img"></div>
    </section>
    <section class="cart">
        <h2 class="cart__title">Lịch sử đặt hàng</h2>
        <?php
        if (!empty($_SESSION['user'])) {
        ?>
            <div class="bd-grid">
                <table class="cart__table">
                    <thead>
                        <th class="cart__head">Id Đơn</th>
                        <th class="cart__head">Sản phẩm</th>
                        <th class="cart__head">Hình ảnh</th>
                        <th class="cart__head">Giá</th>
                        <th class="cart__head">Số lượng</th>
                        <th class="cart__head">Thành tiền</th>
                        <th class="cart__head">Trạng thái</th>
                    </thead>
                    <?php
                    $total = [];
                    ?>

                    <tbody>
                        <?php
                        foreach ($orderid as $val) {
                            $detailod = $db->historyOrder("orders_detail", "order_id", $val['order_id']);
                            foreach ($detailod as $value) {
                        ?>
                                <tr>
                                    <td class="cart__item">
                                        <span><?php echo $value['order_id']; ?></span>
                                    </td>
                                    <td class="cart__item">
                                        <span><?php echo $value['ordetail_Name']; ?></span>
                                    </td>
                                    <td class="cart__item">
                                        <img src="upload/<?php echo $value['ordetail_Image']; ?>" alt="">
                                    </td>
                                    <td class="cart__item cart__price">$ <?php echo $value['ordetail_Price']; ?>.00</td>
                                    <td class="cart__item">
                                        <?php echo $value['ordetail_Qty']; ?>
                                    </td>
                                    <td class="cart__item cart__price">$
                                        <?php
                                        echo $value['ordetail_Total'];
                                        ?>.00
                                    </td>
                                    <td class="cart__item">
                                        <?= $val['orderStatus'] == "-1" ? "<span class='btn btn-danger'>Đã hủy đơn</span>" : ""; ?>
                                        <?= $val['orderStatus'] == "0" ? "<span class='btn btn-warning'>Chờ xử lý</span>" : ""; ?>
                                        <?= $val['orderStatus'] == "1" ? "<span class='btn btn-primary'>Đang giao hàng</span>" : ""; ?>
                                        <?= $val['orderStatus'] == "2" ? "<span class='btn btn-success'>Đã giao hàng</span>" : ""; ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>

        <?php } else { ?>
            <div> Bạn cần phải đăng nhập để xem lịch sử đặt hàng !!!! </div>
        <?php  } ?>
    </section>

</main>
<!-- ========== BACKGROUND =========== -->



<?php
require 'inc/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>

</html>