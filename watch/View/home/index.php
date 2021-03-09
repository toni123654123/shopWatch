<?php
require 'inc/header.php';
?>

<main class="l-main">
    <!-- ========== HOME =========== -->
    <section class="home">
        <div class="home__container bd-grid">
            <div class="home__data">
                <div class="home__title">
                    Select Your New Perfect Style
                </div>
                <div class="home__desc">
                    Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                    consequat is aute irure.
                </div>

                <a href="#" class="button">SHOP NOW</a>
            </div>

            <img src="assets/img/watch.png" alt="" class="home__img">
        </div>
    </section>

    <!-- ========== NEW ARRIVALS =========== -->
    <section class="new">
        <h2 class="new__title">
            New Arrivals
        </h2>
        <?php
        if ($desc != 0) { ?>
            <div class="new__container bd-grid">
                <?php
                foreach ($desc as $val) {
                ?>
                    <div class="new__product">
                        <div class="new__box">
                            <img src="upload/<?php echo $val['proImage']; ?>" alt="">
                        </div>
                        <div class="new__data">
                            <a href="index.php?c=product&a=item&id=<?php echo $val['proId']; ?>" class="new__name featured__name"><?php echo $val['proName']; ?></a>
                            <div class="new__price">$ <?php echo $val['proPrice']; ?>.00</div>
                        </div>
                    </div>
                <?php }
            } else { ?>
            </div>
            <p style="text-align:center;">Không có sản phẩm nào !!!</p>
        <?php } ?>
    </section>

    <!-- ========== GALLERY =========== -->
    <section class="gallery">
        <div class="gallery__container bd-grid">
            <div class="gallery__box">
                <img src="assets/img/gallery1.png" alt="" class="gallery__item">
            </div>
            <div class="gallery__box">
                <img src="assets/img/gallery2.png" alt="" class="gallery__item">
            </div>
            <div class="gallery__box">
                <img src="assets/img/gallery3.png" alt="" class="gallery__item">
            </div>
            <div class="gallery__box">
                <img src="assets/img/gallery4.png" alt="" class="gallery__item">
            </div>
        </div>
    </section>

    <!-- ========== FEATURE =========== -->
    <section class="featured">
        <h2 class="featured__title">Popular Items</h2>
        <span class="featured__desc">Consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
        </span>


        <?php if ($asc != 0) { ?>
            <div class="featured__container bd-grid">
                <?php
                foreach ($asc as $val) {
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
            } else { ?>
                <p>Không có sản phẩm nào !!!</p>;
            <?php } ?>
            </div>


            <a href="index.php?c=product" class="button featured__view">View more product</a>
    </section>

    <!-- ========== BACKGROUND =========== -->

    <section class="background">
        <div class="background__img"></div>
    </section>

    <!-- ========== WATCH CHOICE =========== -->
    <section class="choice">
        <div class="choice__container bd-grid">
            <div class="choice__box">
                <div class="choice__data">
                    <h2 class="choice__name">Watch of Choice</h2>
                    <span class="choice__desc">Enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse.
                    </span>

                    <a href="#" class="button">SHOW WATCHES</a>
                </div>
                <div class="choice__box--img">
                    <img src="assets/img/popular1.png" alt="" class="choice__img">
                </div>

            </div>

            <div class="choice__box">

                <div class="choice__box--img">
                    <img src="assets/img/popular2.png" alt="" class="choice__img">
                </div>

                <div class="choice__data">
                    <h2 class="choice__name">Watch of Choice</h2>
                    <span class="choice__desc">Enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse.
                    </span>

                    <a href="#" class="button">SHOW WATCHES</a>
                </div>


            </div>
        </div>
    </section>

    <?php
    require 'inc/footer.php';
    ?>
    </body>

    </html>