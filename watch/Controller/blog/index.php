<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {
    case 'blog': {
            $data = $db->Getall("blog");
        }

        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        if (isset($_SESSION['heart'])) {
            $heart = $_SESSION['heart'];
        }
        require_once("View/blog/index.php");

    case 'item': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataid = $db->getId("blog", "blog_id", $id);
                $data = $db->Getall("blog");
            }

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/blog/item.php");
        }
    default: {

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            $data = $db->Getall("blog");
            require_once("View/blog/index.php");
            break;
        }
}
