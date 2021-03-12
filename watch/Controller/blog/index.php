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
