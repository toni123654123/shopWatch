<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {
    default: {
            if (!empty($_SESSION['user'])) {
                $userid = $db->getId('user', 'user', $_SESSION['user']);
                $orderid = $db->historyOrder('orders', 'userid', $userid['userid']);
            }
            require_once("View/historyOrder/index.php");
            break;
        }
}
