<?php include('inc/header.php'); ?>
<main class="l-main">

    <section class="background">
        <div class="background__img"></div>
    </section>
    <!-- ========== BLOG =========== -->
    <section class="blog">
        <div class="blog__container bd-grid">
            <div class="blog__news">
                <?php if ($data != "") {
                    foreach ($data as $val) {  ?>
                        <div class="blog__box">
                            <div class="blog__img">
                                <img src="/upload/<?= $val['image']; ?>" alt="">
                                <div class="blog__time"> <?= $val['time']; ?></div>
                            </div>
                            <div class="blog__data">
                                <a href="index.php?c=blog&a=item&id=<?= $val['blog_id']; ?>" class="blog__title"><?= $val['title']; ?></a>
                                <div class="blog__desc">
                                    <?= $val['content']; ?>
                                </div>
                                <div class="blog__note">
                                    <div class="blog__author"><i class='bx bxs-user'></i> <?= $val['author']; ?></div>
                                    <div class="blog__cmt"><i class='bx bx-message-rounded'></i> 3 Comment</div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div style="text-align: center;">Không tìm thấy bài viết</div>
                <?php } ?>
            </div>
            <div class="blog__cate">
                <div class="blog__box blog__cate--box">
                    <form action="" method="get">
                        <div class="form-group">
                            <input type="hidden" name="c" value="blog">
                            <input type="hidden" name="a" value="srch">
                            <input type="search" name="q" class="blog__srch" placeholder="Tìm kiếm ...">
                            <button type="submit" class="blog__icon-srch"><i class='bx bx-search'></i></button>
                        </div>
                        <button type="submit" class="blog__btn-srch">Search</button>
                    </form>
                </div>

                <div class="blog__box blog__cate--box">
                    <div class="blog__cate--title">Tin tức khác</div>
                    <?php foreach ($data as $val) { ?>
                        <div class="blog__other">
                            <div class="blog__other--img">
                                <img src="/upload/<?= $val['image']; ?>" alt="">
                            </div>
                            <div class="blog__other--data">
                                <a href="index.php?c=blog&a=item&id=<?= $val['blog_id']; ?>" class="blog__other--title">
                                    <?= $val['title']; ?>
                                </a>
                                <div class="blog__other--desc">
                                    <?= $val['content']; ?>
                                </div>
                                <div class="blog__other--time">Tác giả: <?= $val['author']; ?> / <?= $val['time']; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>


    <?php
    require 'inc/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    </body>

    </html>