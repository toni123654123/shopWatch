<?php
require 'inc/header.php';
?>

<main class="l-main">

    <section class="background">
        <div class="background__img"></div>
    </section>
    <!-- ========== PRODUCT =========== -->
    <section class="cart">
        <h2 class="cart__title">Danh sách sản phẩm yêu thích</h2>

        <p class="error__msg d-none">Hiện bạn chưa có sản phẩm yêu thích nào</p>

        <div class="bd-grid">
            <table class="cart__table">
                <thead>
                    <th class="cart__head"></th>
                    <th class="cart__head"></th>
                    <th class="cart__head">Sản phẩm</th>
                    <th class="cart__head">Mô tả</th>
                    <th class="cart__head">Giá tiền</th>
                </thead>
                <?php
                $total = [];
                ?>

                <tbody>
                    <?php
                    if (!empty($heart)) {
                        foreach ($heart as $val) {
                    ?>
                            <tr>
                                <td class="cart__item text-center">
                                    <a href="index.php?c=heart&a=del&id=<?= $val['proId']; ?>" class="cart__icon"><i class='bx bx-x-circle'></i></a>
                                </td>
                                <td class="cart__item">
                                    <img src="upload/<?php echo $val['proImage']; ?>" alt="">
                                </td>
                                <td class="cart__item">
                                    <span><?php echo $val['proName']; ?></span>
                                </td>
                                <td class="cart__item">
                                    <span><?php echo $val['proDetail']; ?></span>
                                </td>
                                <td class="cart__item cart__price">$ <?php echo $val['proPrice']; ?>.00</td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6" class="text-center cart__item "> Không có sản phẩm nào được yêu thích !!! </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </section>

    <!-- ========== BACKGROUND =========== -->


    <?php
    require 'inc/footer.php';
    ?>
    <script src="/assets/js/jquery.min.js"></script>
    <script>
        function showError() {
            $(".error__msg").removeClass("d-none");
        }
    </script>
    </body>

    </html>