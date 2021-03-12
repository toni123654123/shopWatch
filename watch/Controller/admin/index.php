<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {
    case 'dashboard': {
            $product = $db->Getall("product");
            $cate = $db->Getall("category");
            $user = $db->Getall("admin");
            $order = $db->Getall("orders");
            $cmt = $db->Getall("comment");
            require_once("View/admin/dashboard.php");
            break;
        }

        /** ========================= PRODUCT ==================================*/
    case 'product': {
            $data = $db->Getall("product");
            $cate = $db->Getall("category");

            if (isset($_GET['q'])) {
                $srch = $_GET['q'];
                $data = $db->Search("product", "proName", $srch);
            }

            if (isset($_GET['cate'])) {
                $cate = $_GET['cate'];
                $data = $db->Search("product", "catId", $cate);
                $cate = $db->Getall("category");
            }

            if (isset($_GET['price'])) {
                $filter = $_GET['price'];

                if ($filter == "10") {
                    $data = $db->Filter("product", "proPrice", 10, 300);
                } else if ($filter == "500") {
                    $data = $db->Filter("product", "proPrice", 301, 999);
                } else if ($filter == "1000") {
                    $data = $db->Filter("product", "proPrice", 1000, 100000);
                }
            }
            require_once("View/admin/product/product.php");
            break;
        }

    case 'add_product': {
            if (isset($_POST['addPro'])) {
                $catId = $_POST['catId'];
                $proName = $_POST['proName'];
                $proImage = $_FILES['file']['name'];
                $proPrice = $_POST['proPrice'];
                $proDetail = $_POST['proDetail'];

                if (isset($_FILES['file'])) {
                    if ($_FILES['file']['error'] > 0) {
                        echo "Upload lỗi rồi!";
                    } else {
                        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
                    }
                }

                if ($db->Insert(
                    'product',
                    array(
                        "catId" => $catId,
                        "proName" => $proName,
                        "proImage" => $proImage,
                        "proPrice" => $proPrice,
                        "proDetail" => $proDetail,
                    )
                )) {
                    $msg = "<p style='color: green; text-align: center;'>Thêm sản phẩm thành công !</p>";
                } else {
                    $msg = "<p style='color: red; text-align: center;'>Thêm sản phẩm thất bại !</p>";
                }
            }
            $cat = $db->Getall("category");
            require_once("View/admin/product/add_product.php");
            break;
        }
    case 'edit_product': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataId = $db->getId("product", "proId", $id);
                $catId = $db->getId("category", "catId", $dataId['catId']);
                $dataCat = $db->Getall("category");

                if (isset($_POST['editPro'])) {
                    $catId = $_POST['catId'];
                    $proName = $_POST['proName'];
                    $proImage = $_FILES['file']['name'];
                    $proPrice = $_POST['proPrice'];
                    $proDetail = $_POST['proDetail'];
                    if (isset($_FILES['file'])) {
                        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
                    }

                    if ($proName != $dataId['proName']) {
                        if ($db->Update(
                            'product',
                            'proId',
                            array(
                                "proName" => $proName,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật sản phẩm thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật sản phẩm thất bại !</p>";
                        }
                    }
                    if ($catId != $dataId['catId']) {
                        if ($db->Update(
                            'product',
                            'proId',
                            array(
                                "catId" => $catId,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật sản phẩm thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật sản phẩm thất bại !</p>";
                        }
                    }
                    if ($proPrice != $dataId['proPrice']) {
                        if ($db->Update(
                            'product',
                            'proId',
                            array(
                                "proPrice" => $proPrice,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật sản phẩm thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật sản phẩm thất bại !</p>";
                        }
                    }
                    if ($proDetail != $dataId['proDetail']) {
                        if ($db->Update(
                            'product',
                            'proId',
                            array(
                                "proDetail" => $proDetail,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật sản phẩm thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật sản phẩm thất bại !</p>";
                        }
                    }
                    if ($proImage != "") {
                        if ($db->Update(
                            'product',
                            'proId',
                            array(
                                "proImage" => $proImage,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật sản phẩm thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật sản phẩm thất bại !</p>";
                        }
                    }

                    $dataId = $db->getId("product", "proId", $id);
                    $catId = $db->getId("category", "catId", $dataId['catId']);
                }

                require_once("View/admin/product/edit_product.php");
                break;
            }
        }

    case 'del_product': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($db->Delete("product", "proId", $id)) {
                    $msg = "success";
                    $data = $db->Getall("product");
                } else {
                    $msg = "error";
                }
            }

            require_once("View/admin/product/product.php");
            break;
        }

        //========================= CATEGORY ==================================*/
    case 'category': {
            $data = $db->Getall("category");
            if (isset($_GET['q'])) {
                $srch = $_GET['q'];
                $data = $db->Search("category", "catName", $srch);
            }
            require_once("View/admin/category/category.php");
            break;
        }

    case 'add_cat': {
            if (isset($_POST['addCat'])) {
                $catName = $_POST['catName'];

                if ($db->Insert(
                    'category',
                    array(
                        "catName" => $catName,
                    )
                )) {
                    $msg = "<p style='color: green; text-align: center;'>Thêm danh mục thành công !</p>";
                } else {
                    $msg = "<p style='color: red; text-align: center;'>Thêm danh mục thất bại !</p>";
                }
            }
            require_once("View/admin/category/add_cat.php");
            break;
        }

    case 'edit_cat': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataId = $db->getId("category", "catId", $id);


                if (isset($_POST['editCat'])) {
                    $catName = $_POST['catName'];
                    if ($catName != $dataId['catName']) {

                        if ($db->Update(
                            'category',
                            'catId',
                            array(
                                "catName" => $catName,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật danh mục thành công !</p>";
                            $dataId = $db->getId("category", "catId", $id);
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật danh mục thất bại !</p>";
                        }
                    } else {
                        $msg = "<p style='color: red; text-align: center;'>Cập nhật danh mục thất bại !</p>";
                    }
                }

                require_once("View/admin/category/edit_cat.php");
                break;
            }
        }

    case 'del_cat': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($db->Delete("category", "catId", $id)) {
                    $msg = "success";
                    $data = $db->Getall("category");
                } else {
                    $msg = "error";
                }
            }

            require_once("View/admin/category/category.php");
            break;
        }

        /** ========================= BLOG ==================================*/
    case 'blog': {
            $data = $db->Getall("blog");

            if (isset($_GET['q'])) {
                $srch = $_GET['q'];
                $data = $db->Search("blog", "title", $srch);
            }

            require_once("View/admin/blog/blog.php");
            break;
        }

    case 'add_blog': {
            if (isset($_POST['addBlog'])) {
                $blogTitle = $_POST['blogTitle'];
                $blogImg = $_FILES['file']['name'];
                $blogContent = $_POST['blogContent'];
                $blogAuthor = $_POST['blogAuthor'];
                $date = date('m/d H:i', time());

                if (isset($_FILES['file'])) {
                    if ($_FILES['file']['error'] > 0) {
                        echo "Upload lỗi rồi!";
                    } else {
                        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
                    }
                }

                if ($db->Insert(
                    'blog',
                    array(
                        "title" => $blogTitle,
                        "image" => $blogImg,
                        "content" => $blogContent,
                        "author" => $blogAuthor,
                        "time" => $date,
                    )
                )) {
                    $msg = "<p style='color: green; text-align: center;'>Thêm tin tức thành công !</p>";
                } else {
                    $msg = "<p style='color: red; text-align: center;'>Thêm tin tức thất bại !</p>";
                }
            }
            require_once("View/admin/blog/add_blog.php");
            break;
        }
    case 'edit_blog': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataId = $db->getId("blog", "blog_id", $id);

                if (isset($_POST['editBlog'])) {
                    $blogTitle = $_POST['blogTitle'];
                    $blogImg = $_FILES['file']['name'];
                    $blogContent = $_POST['blogContent'];
                    $blogAuthor = $_POST['blogAuthor'];
                    $timeUpdate = date('m/d H:i', time());
                    if (isset($_FILES['file'])) {
                        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
                    }

                    if ($blogTitle != $dataId['title']) {
                        if ($db->Update(
                            'blog',
                            'blog_id',
                            array(
                                "title" => $blogTitle,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật tin tức thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật tin tức thất bại !</p>";
                        }
                    }

                    if ($blogContent != $dataId['content']) {
                        if ($db->Update(
                            'blog',
                            'blog_id',
                            array(
                                "content" => $blogContent,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật tin tức thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật tin tức thất bại !</p>";
                        }
                    }
                    if ($blogAuthor != $dataId['author']) {
                        if ($db->Update(
                            'blog',
                            'blog_id',
                            array(
                                "author" => $blogAuthor,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật tin tức thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật tin tức thất bại !</p>";
                        }
                    }
                    if ($blogImg != "") {
                        if ($db->Update(
                            'blog',
                            'blog_id',
                            array(
                                "image" => $blogImg,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật tin tức thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật tin tức thất bại !</p>";
                        }
                    }

                    if ($blogImg != "") {
                        if ($db->Update(
                            'blog',
                            'blog_id',
                            array(
                                "image" => $blogImg,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật tin tức thành công !</p>";
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật tin tức thất bại !</p>";
                        }
                    }

                    if ($db->Update(
                        'blog',
                        'blog_id',
                        array(
                            "time" => $timeUpdate,
                        ),
                        $id
                    )) {
                        $msg = "<p style='color: green; text-align: center;'>Cập nhật tin tức thành công !</p>";
                    } else {
                        $msg = "<p style='color: red; text-align: center;'>Cập nhật tin tức thất bại !</p>";
                    }

                    $dataId = $db->getId("blog", "blog_id", $id);
                }

                require_once("View/admin/blog/edit_blog.php");
                break;
            }
        }

    case 'del_blog': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($db->Delete("blog", "blog_id", $id)) {
                    $msg = "success";
                    $data = $db->Getall("blog");
                } else {
                    $msg = "error";
                }
            }

            require_once("View/admin/blog/blog.php");
            break;
        }


        /**===================================== USER ==================================*/
    case 'user': {
            $data = $db->Getall("admin");
            if (isset($_GET['q'])) {
                $srch = $_GET['q'];
                $data = $db->Search("admin", "adUser", $srch);
            }

            if (isset($_GET['role'])) {
                $role = $_GET['role'];
                $data = $db->Search("admin", "adRole", $role);
            }

            require_once("View/admin/user/user.php");
            break;
        }


    case 'add_user': {
            if (isset($_POST['addUser'])) {
                $adUser = $_POST['adUser'];
                $adPass = base64_encode($_POST['adPass']);
                $adName = $_POST['adName'];
                $adPhone = $_POST['adPhone'];
                $adEmail = $_POST['adEmail'];
                $adRole = $_POST['adRole'];

                if ($db->Insert(
                    'admin',
                    array(
                        "adUser" => $adUser,
                        "adPass" => $adPass,
                        "adName" => $adName,
                        "adPhone" => $adPhone,
                        "adEmail" => $adEmail,
                        "adRole" => $adRole,
                    )
                )) {
                    $msg = "<p style='color: green; text-align: center;'>Thêm thành viên thành công !</p>";
                } else {
                    $msg = "<p style='color: red; text-align: center;'>Thêm thành viên thất bại !</p>";
                }
            }
            require_once("View/admin/user/add_user.php");
            break;
        }

    case 'reset': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($data = $db->getId("admin", "admin_id", $id)) {

                    if (isset($_POST['editUser'])) {
                        $reset =  base64_encode($_POST['adPass']);
                        if ($db->Update(
                            'admin',
                            'admin_id',
                            array(
                                "adPass" => $reset,
                            ),
                            $id
                        )) {
                            $msg = "<p style='color: green; text-align: center;'>Cập nhật user thành công !</p>";
                            $data = $db->getId("admin", "admin_id", $id);
                        } else {
                            $msg = "<p style='color: red; text-align: center;'>Cập nhật user thất bại !</p>";
                        }
                    }
                }
            }

            require_once("View/admin/user/reset_pass.php");
            break;
        }

    case 'del_user': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($db->Delete("admin", "admin_id", $id)) {
                    $msg = "success";
                    $data = $db->Getall("admin");
                } else {
                    $msg = "error";
                }
            }

            require_once("View/admin/user/user.php");
            break;
        }

        /**==================== ========================= ORDER ==================================*/
    case 'order': {
            $data = $db->Getall('orders');
            if (isset($_GET['donid'])) {
                $donid = $_GET['donid'];
                $data = $db->Search("orders", "order_id", $donid);
            }

            if (isset($_GET['user'])) {
                $user = $_GET['user'];
                $data = $db->Search("orders", "orderName", $user);
            }

            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                $data = $db->Search("orders", "orderStatus", $status);
            }
            require_once("View/admin/order/order.php");
            break;
        }

    case 'detail': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataId = $db->getId("orders", "order_id", $id);
                $userId = $db->getId("user", "userid", $dataId['userid']);
                $data = $db->detaiOrder("orders_detail", $id);
            }
            require_once("View/admin/order/order_detail.php");
            break;
        }

    case 'check': {
            if (isset($_GET['status']) && isset($_GET['id'])) {
                $status = $_GET['status'];
                $id = $_GET['id'];
                $db->Update(
                    "orders",
                    "order_id",
                    array(
                        "orderStatus" => $status
                    ),
                    $id
                );
            }
            require_once("View/admin/order/check.php");
            break;
        }
        /** =============================================== LOGIN ==================================*/
    case 'login': {
            if (isset($_POST['login'])) {
                $user = $_POST["user"];
                $password = base64_encode($_POST["password"]);

                if ($user == "" || $password == "") {
                    $msg = "<p style='color: red; text-align: center;'>Tài khoản mật khẩu không được rỗng !</p>";
                } else {
                    if ($data = $db->login("admin", "adUser", "adPass", $user, $password)) {
                        $_SESSION['data'] = $data;
                        $_SESSION['adUser'] = $user;
                    } else {
                        $msg = "<p style='color: red; text-align: center;'>Tài khoản hoặc mật khẩu không đúng !</p>";
                    }
                }
            }

            if (isset($_SESSION['adUser'])) {
                header('Location: index.php?c=admin');
            }
            require_once("View/admin/login.php");
            break;
        }

    case 'logout': {
            unset($_SESSION['adUser']);
            session_destroy();
            header('Location: index.php?c=admin&a=login');
            require_once("View/Login/logout.php");
            break;
        }





        /** ====================================== DEFAULT ============================================= */
    default: {
            $product = $db->Getall("product");
            $cate = $db->Getall("category");
            $user = $db->Getall("admin");
            $order = $db->Getall("orders");
            $cmt = $db->Getall("comment");
            require_once("View/admin/dashboard.php");
            break;
        }
}
