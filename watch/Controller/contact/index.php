<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {
    default: {
            require_once("View/contact/index.php");
            break;
        }
}
