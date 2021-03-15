<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {

    case 'del': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                unset($_SESSION['heart'][$id]);
            }
            $heart = $_SESSION['heart'];
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/heart/index.php");
            break;
        }

    default: {
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/heart/index.php");
            break;
        }
}
