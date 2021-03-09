<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {
    default: {
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $info = $db->getId("user", "user", $user);
            }

            $cart = $_SESSION['cart'];

            if (isset($_POST['order']) && isset($_SESSION['user'])) {
                $orderName = $_POST['orderName'];
                $orderPhone = $_POST['orderPhone'];
                $orderShip = $_POST['orderShip'];
                $orderEmail = $_POST['orderEmail'];
                $orderTotal = $_POST['orderTotal'];
                $Payments = $_POST['Payments'];
                if (
                    $orderName == ""  ||
                    $orderPhone == ""  ||
                    $orderShip == ""  ||
                    $orderEmail == ""
                ) {
                    $msg = "<p style='color: red; text-align: center; margin-bottom: 10px;'>Vui lòng điền đầy đủ các trường !!!</p>";
                } else {

                    if (
                        $db->Insert(
                            "orders",
                            array(
                                "orderName"  => $orderName,
                                "orderPhone"  => $orderPhone,
                                "orderShip"  => $orderShip,
                                "orderEmail"  =>  $orderEmail,
                                "orderTotal" => $orderTotal,
                                "Payments" => $Payments,
                                "orderStatus" => "0",
                            )
                        )
                    ) {
                        $msg = "<p style='color: green; text-align: center; margin-bottom: 10px;'>Đặt hàng thành công !!!</p>";
                        header("location: index.php?c=cart");
                        unset($_SESSION['cart']);
                    } else {
                        $msg = "<p style='color: red; text-align: center; margin-bottom: 10px;'>Đặt hàng thất bại !!!</p>";
                    }
                }

                $orderId = $db->getOrder("orders");
                foreach ($cart as $val) {
                    $db->Insert(
                        "orders_detail",
                        array(
                            "order_id"  => $orderId['order_id'],
                            "proId"  => $val['proId'],
                            "ordetail_Name"  => $val['proName'],
                            "ordetail_Image"  =>  $val['proImage'],
                            "ordetail_Price" => $val['proPrice'],
                            "ordetail_Qty" => $val['quantity'],
                            "ordetail_Total" => $val['proPrice'] * $val['quantity'],
                        )
                    );
                }
            } else {
                $msg = "<p style='color: red; text-align: center; margin-bottom: 10px;'>Vui lòng đăng nhập để thanh toán !!!</p>";
            }
            require_once("View/order/index.php");
            break;
        }
}
