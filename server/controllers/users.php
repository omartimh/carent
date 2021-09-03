<?php
    require_once '../views/Users.php';
    require_once '../models/user.php';
    $message = '';

    if (isset($_REQUEST['user'])) {
        if ($_REQUEST['user'] == "login") {
            $objView = new Users();
            $objView->login($message);
        }

        if ($_REQUEST['user'] == "logout") {
            if (!isset($_SESSION))
                session_start();
            unset($_SESSION);
            session_destroy(); 
            header("location: ../../index.php");
            exit();
        }

        if ($_REQUEST['user'] == "reg") {
            $objView = new Users();
            $objView->register($message);
        }
    }

    if (isset($_REQUEST['login'])) {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $objModel = new User();
        $user = $objModel->getUser($email);
        $objView = new Users();
        if (!$user) {
            $message = "Invalid User";
            $objView->login($message);
        } else {
            if ($password != $user['password']) {
                $message = "Incorrect Credentials";
                $objView->login($message);
            } else {
                session_start();
                $_SESSION = [
                    'userId' => $user['id'],
                    'userName' => $user['name'],
                    'userEmail' => $user['email'],
                    'userPassword' => $user['password']
                ];
                header("location: ../../index.php");
                exit();
            }
        }
    }

    if (isset($_REQUEST['register'])) {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $repeatePassword = $_REQUEST['repeatePassword'];
        $objModel = new User();
        $user = $objModel->getUser($email);
        $objView = new Users();
        if ($user) {
            $message = "User Already Exists!";
            $objView->register($message);
        } else {
            if ($password != $repeatePassword) {
                $message = "Passwords Do Not Match!";
                $objView->register($message);
            } else {
                $objModel->createUser($name, $email, $password);
                $user = $objModel->getUser($email);
                session_start();
                $_SESSION = [
                    'userId' => $user['id'],
                    'userName' => $user['name'],
                    'userEmail' => $user['email'],
                    'userPassword' => $user['password']
                ];
                header("location: ../../index.php");
                exit();
            }
        }
    }
?>