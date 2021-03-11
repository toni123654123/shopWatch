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
            require_once("View/heart/index.php");
            break;
        }

    default: {
            $heart = $_SESSION['heart'];
            $cart = $_SESSION['cart'];
            require_once("View/heart/index.php");
            break;
        }
}
