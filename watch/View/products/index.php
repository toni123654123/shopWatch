<?php include('inc/header.php'); ?>
<main class="l-main">

    <section class="background">
        <div class="background__img"></div>
    </section>
    <!-- ========== FEATURE =========== -->
    <section class="featured">
        <h2 class="featured__title">Danh sách sản phẩm</h2>
        <span class="featured__desc">Consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
        </span>
        <div class="featured__filter bd-grid">
            <div class="featured__cate">
                <form action="" method="get">
                    <input type="hidden" name="c" value="product">
                    <input type="hidden" name="a" value="srch">
                    <button type="submit" class="featured__cate--btn" name="cate" value="">All</button>
                    <button type="submit" class="featured__cate--btn" name="cate" value="2">Hublot</button>
                    <button type="submit" class="featured__cate--btn" name="cate" value="3">Rolex</button>
                    <button type="submit" class="featured__cate--btn" name="cate" value="4">Omega</button>
                    <button type="submit" class="featured__cate--btn" name="cate" value="5">Casio</button>
                </form>
            </div>
            <div class="featured__srch">
                <form action="" method="get" class="featured__form">
                    <input type="hidden" name="c" value="product">
                    <input type="hidden" name="a" value="srch">
                    <input type="text" class="featured__form--srch" name="q" placeholder="Tìm kiếm....">
                    <button type="submit" class="featured__form--btn"><i class='bx bx-search-alt nav__cart'></i></button>
                </form>

                <div class="featured__orderby">
                    <span>filter <i class='bx bx-caret-down'></i></span>
                    <ul class="featured__orderby--list">
                        <li class="featured__orderby--item">
                            <form action="" method="get" class="featured__form" id="form">
                                <input type="hidden" name="c" value="product">
                                <input type="hidden" name="a" value="filter">
                                <div class="form-group">
                                    <input id="$10" type="checkbox" class="radio" value="10" name="price" <?= ((isset($_GET['price'])) && $_GET['price'] == "10") ? 'checked' : ""
                                                                                                            ?> />
                                    <label for="$10">$10.00 - $300.00</label>
                                </div>
                                <div class="form-group">
                                    <input id="$50" type="checkbox" class="radio" value="500" name="price" <?= (isset($_GET['price']) && $_GET['price'] == "500") ? 'checked' : ""
                                                                                                            ?> />
                                    <label for="$50">$300.00 - $500.00</label>
                                </div>
                                <div class="form-group">
                                    <input id="$500" type="checkbox" class="radio" value="1000" name="price" <?= (isset($_GET['price']) && $_GET['price'] == "1000") ? 'checked' : ""
                                                                                                                ?> />
                                    <label for="$500">$1000.00</label>
                                </div>
                            </form>
                        </li>
                        <form action="" method="get" class="featured__form">
                            <li class="featured__orderby--item">
                                <button type="submit" name="orderby" value="asc" class="featured__orderby--btn">Price: Từ thấp đến cao</button>
                            </li>
                            <li class="featured__orderby--item">
                                <button type="submit" name="orderby" value="desc" class="featured__orderby--btn">Price: Từ cao đến thấp</button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <?php if ($data != 0) { ?>
            <div class="featured__container bd-grid">
                <?php
                foreach ($data as $val) {
                ?>
                    <div class="featured__product">
                        <div class="featured__box">
                            <img src="upload/<?php echo $val['proImage'];
                                                ?>" alt="">
                            <?php
                            if (!empty($_SESSION['user'])) { ?>
                                <a href="index.php?c=product&a=heartcart&id=<?php echo $val['proId']; ?>">
                                    <i class='bx bx-heart featured__icon'></i>
                                </a>
                            <?php } else { ?>
                                <a href="#" onclick='showErrorToast("Bạn cần phải đăng nhập để yêu thích sản phẩm !")'>
                                    <i class='bx bx-heart featured__icon'></i>
                                </a>
                            <?php } ?>

                            <a href="index.php?c=product&a=addcart&id=<?php echo $val['proId'];
                                                                        ?>" class="button">Thêm vào giỏ</a>
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
    </section>

    <!-- ========== BACKGROUND =========== -->


    <?php
    require 'inc/footer.php';
    ?>
    <script src="/assets/js/jquery.min.js"></script>
    <script>
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);

            } else {
                $box.prop("checked", false);
            }
        });

        $("input:checkbox").on('change', function() {
            $('#form').submit();
        });
    </script>
    </body>

    </html>