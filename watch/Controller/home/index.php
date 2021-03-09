<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {
    case 'home': {
            $desc = $db->getLimit("product", "DESC", 3);
            $asc = $db->getLimit("product", "ASC", 6);
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            require_once("View/home/index.php");
            break;
        }

    default: {
            $desc = $db->getLimit("product", "DESC", 3);
            $asc = $db->getLimit("product", "ASC", 6);
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            require_once("View/home/index.php");
            break;
        }
}
