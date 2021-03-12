<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {

    case 'update': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if (isset($_GET['qty'])) {
                    $_SESSION['cart'][$id]['quantity'] = $_GET['qty'];
                }
            }
            $cart = $_SESSION['cart'];
            require_once("View/cart/index.php");
            break;
        }

    case 'del': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                unset($_SESSION['cart'][$id]);
            }
            $cart = $_SESSION['cart'];
            require_once("View/cart/index.php");
            break;
        }

    default: {
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/cart/index.php");
            break;
        }
}
