<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {

    default: {
            $heart = $_SESSION['heart'];
            $cart = $_SESSION['cart'];
            require_once("View/heart/index.php");
            break;
        }
}
