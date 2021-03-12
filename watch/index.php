<?php
include "Model/db.php";
$db = new Database;
$db->connect();

if (isset($_GET['c'])) {
    $controller = $_GET['c'];
} else {
    $controller = '';
}

switch ($controller) {
    case 'login': {
            require_once("Controller/Login/index.php");
            break;
        }

    case 'home': {
            require_once("Controller/home/index.php");
            break;
        }

    case 'product': {
            require_once("Controller/products/index.php");
            break;
        }

    case 'history': {
            require_once("Controller/history/index.php");
            break;
        }

    case 'blog': {
            require_once("Controller/blog/index.php");
            break;
        }

    case 'cart': {
            require_once("Controller/cart/index.php");
            break;
        }

    case 'heart': {
            require_once("Controller/heart/index.php");
            break;
        }

    case 'order': {
            require_once("Controller/order/index.php");
            break;
        }

    case 'admin': {
            require_once("Controller/admin/index.php");
            break;
        }

    default: {
            require_once("Controller/home/index.php");
            break;
        }
}
