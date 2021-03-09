<?php
require 'inc/header.php';
?>

<main class="l-main">

    <section class="background">
        <div class="background__img"></div>
    </section>
    <!-- ========== PRODUCT =========== -->
    <section class="products">
        <h2 class="products__title">Products Items</h2>

        <div class="products__container bd-grid">
            <div class="products__box">
                <img src="upload/<?= $data['proImage']; ?>" alt="">
                <i class='bx bx-heart products__icon'></i>
            </div>

            <div class="products__data">
                <h1 class="products__name"><?= $data['proName']; ?></h1>
                <p class="products__desc">Consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                </p>
                <p class="products__price">$ <?= $data['proPrice']; ?></p>
                <input type="hidden" name="ids" value="<?= $data['proId']; ?>">
                <a href="index.php?c=product&a=item&ids=<?= $data['proId']; ?>" class="button">Add to cart</a>
            </div>

        </div>
        <?php
        if (!empty($_SESSION['user'])) { ?>
            <form action="" method="post" class="products__cmt bd-grid">
                <div class="products__cmt--info">
                    <div class="products__cmt--box">
                        <div class="products__cmt--info">
                            <img src="assets/img/new_product1.png" alt="">
                        </div>
                        <div class="products__cmt--title">
                            <h3><?= $_SESSION['user']; ?></h3>
                            <textarea name="cmtText" id="" class="products__text" placeholder="Bình luận tại đây"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="cmt" class="products__submit">Bình luận</button>
                    </div>
                </div>
            </form>
        <?php } ?>


        <div class="bd-grid">
            <ul class="products__cmt--list">
                <?php
                if (!empty($dataCmt)) {
                    foreach ($dataCmt as $val) { ?>
                        <li class="products__cmt--item">
                            <div class="products__cmt--box">
                                <div class="products__cmt--info">
                                    <img src="assets/img/new_product1.png" alt="">

                                </div>
                                <div class="products__cmt--title">
                                    <h3><?= $val['cmt_name'] ?></h3>
                                    <span class="products__cmt--desc"><?= $val['cmt_text'] ?></span>
                                </div>
                                <Button class="products__feedback">Phản hồi</Button>
                            </div>
                        </li>
                <?php }
                } ?>
                <li></li>
            </ul>
        </div>

    </section>

    <!-- ========== BACKGROUND =========== -->

    <?php
    require 'inc/footer.php';
    ?>
    </body>

    </html>