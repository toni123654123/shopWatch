<?php
session_start();
if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

switch ($action) {

    case 'signup': {
            if (isset($_POST['signup'])) {
                $user = $_POST['user'];
                $pass = base64_encode($_POST['password']);
                $fname = $_POST['fname'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];

                //check user
                $username = $db->check_register("user", "user", "email", $user, $email);
                if (empty($username)) {
                    if ($db->Insert(
                        'user',
                        array(
                            "user" => $user,
                            "password" => $pass,
                            "fullname" => $fname,
                            "phone" => $phone,
                            "email" => $email,
                            "address" => $address
                        )
                    )) {
                        header('Location: index.php?c=login');
                    }
                } else {
                    $error[] = "error";
                }
            }

            if (isset($_SESSION['user'])) {
                header('Location: index.php');
            }

            require_once("View/Login/register.php");
            break;
        }

    case 'logout': {
            unset($_SESSION['user']);
            session_destroy();
            header('Location: index.php');
            require_once("View/Login/logout.php");
            break;
        }


    default: {
            if (isset($_POST['signin'])) {
                $user = $_POST["user"];
                $password = base64_encode($_POST["password"]);

                if ($user == "" || $password == "") {
                    $error = "Tài khoản mật khẩu không được rỗng !";
                } else {
                    if ($db->login("user", "user", "password", $user, $password)) {
                        $_SESSION['user'] = $user;
                    } else {
                        $error = "Tài khoản hoặc mật khẩu không đúng !";
                    }
                }
            }

            if (isset($_SESSION['user'])) {
                header('Location: index.php');
            }

            require_once("View/Login/index.php");
            break;
        }
}
