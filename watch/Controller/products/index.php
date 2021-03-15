<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {
    case 'list': {
            $data = $db->Getall("product");
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/products/index.php");
            break;
        }

    case 'item': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data = $db->getId("product", "proId", $id);
                $similar = $db->Get("product", "catId", $data['catId']);
            }

            if (isset($_GET['ids'])) {
                $id = $_GET['ids'];
                $data = $db->getId("product", "proId", $id);
                $similar = $db->Get("product", "catId", $data['catId']);

                $item = [
                    'proId' => $data['proId'],
                    'proName' => $data['proName'],
                    'proImage' => $data['proImage'],
                    'proPrice' => $data['proPrice'],
                    'quantity' => $_GET['qty'],
                ];




                if (isset($_SESSION['cart'])) {
                    if (isset($_SESSION['cart'][$id])) {
                        $_SESSION['cart'][$id]['quantity'] += $_GET['qty'];
                    } else {
                        $_SESSION['cart'][$id] = $item;
                    }
                } else {
                    $_SESSION['cart'][$id] = $item;
                }
            }

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            if (isset($_GET['Id'])) {
                $id = $_GET['Id'];
                $data = $db->getId("product", "proId", $id);
                $heartcart = $db->getId("product", "proId", $id);

                $item = [
                    'proId' => $heartcart['proId'],
                    'proName' => $heartcart['proName'],
                    'proImage' => $heartcart['proImage'],
                    'proDetail' => $heartcart['proDetail'],
                    'proPrice' => $heartcart['proPrice'],
                    'quantity' => 1,
                ];


                $_SESSION['heart'][$id] = $item;
            }

            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            } 



            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $info = $db->getId("user", "user", $user);
            }

            require_once("View/products/item.php");
            break;
        }


    case 'srch': {
            if (isset($_GET['q'])) {
                $srch = $_GET['q'];
                $data = $db->Search("product", "proName", $srch);
            }

            if (isset($_GET['cate'])) {
                $cate = $_GET['cate'];
                $data = $db->Search("product", "catId", $cate);
            }
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/products/index.php");
            break;
        }

    case 'filter': {
            if (isset($_GET['price'])) {
                $filter = $_GET['price'];

                if ($filter == "10") {
                    $data = $db->Filter("product", "proPrice", 10, 300);
                } else if ($filter == "500") {
                    $data = $db->Filter("product", "proPrice", 301, 999);
                } else if ($filter == "1000") {
                    $data = $db->Filter("product", "proPrice", 1000, 100000);
                }
            } else {
                $data = $db->Getall("product");
            }

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/products/index.php");
            break;
        }



    case 'addcart': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $addcart = $db->getId("product", "proId", $id);

                $item = [
                    'proId' => $addcart['proId'],
                    'proName' => $addcart['proName'],
                    'proImage' => $addcart['proImage'],
                    'proPrice' => $addcart['proPrice'],
                    'quantity' => 1,
                ];

                if (isset($_SESSION['cart'])) {
                    if (isset($_SESSION['cart'][$id])) {

                        $_SESSION['cart'][$id]['quantity'] += 1;
                    } else {
                        $_SESSION['cart'][$id] = $item;
                    }
                } else {
                    $_SESSION['cart'][$id] = $item;
                }
            }

            if (!isset($_SESSION['cart'])) {
                return  false;
            } else {
                $cart = $_SESSION['cart'];
            }


            
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }

            $data = $db->Getall("product");
            require_once("View/products/index.php");
            break;
        }

    case 'heartcart': {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $heartcart = $db->getId("product", "proId", $id);

                $item = [
                    'proId' => $heartcart['proId'],
                    'proName' => $heartcart['proName'],
                    'proImage' => $heartcart['proImage'],
                    'proDetail' => $heartcart['proDetail'],
                    'proPrice' => $heartcart['proPrice'],
                    'quantity' => 1,
                ];


                $_SESSION['heart'][$id] = $item;
            }

            if (!isset($_SESSION['heart'])) {
                return  false;
            } else {
                $heart = $_SESSION['heart'];
            }

            
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }

            $data = $db->Getall("product");
            require_once("View/products/index.php");
            break;
        }




    default: {
            $data = $db->Getall("product");
            // session_destroy();
            // die();
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }

            if (isset($_SESSION['heart'])) {
                $heart = $_SESSION['heart'];
            }
            require_once("View/products/index.php");
            break;
        }
}
