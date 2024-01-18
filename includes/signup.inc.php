<?php

    require_once './testInputUtility.php';
    require_once '../classes/db_handler.php';
    require_once '../classes/user.php';

    session_start();
    $name = testInput($_POST['name']);
    $username = testInput($_POST['username']);
    $email = testInput($_POST['email']);
    $pwd = testInput($_POST['pwd']);
    $pwdrepeat = testInput($_POST['pwdrepeat']);

    if(!$name || !$username || !$email || !$pwd || !$pwdrepeat) {
        $_SESSION['registrationError'] = "Всички полета са задължителни!";
        header('Location: ../src/signup.php');
    } else {
        if(strlen($name) > 200) {
            $_SESSION['registrationError'] = "Името трябва да се състои от най-много 200 символа!";
            header('Location: ../src/signup.php');
        } else if(strlen($username) > 200) {
            $_SESSION['registrationError'] = "Потребителското име се състои от най-много 200 символа!";
            header('Location: ../src/signup.php');
        } else if(strlen($email) > 200) {
            $_SESSION['registrationError'] = "Имейлът се състои от най-много 200 символа!";
            header('Location: ../src/signup.php');
        } else if($pwd != $pwdrepeat) {
            $_SESSION['registrationError'] = "Повторно въведената парола не съвпада!";
            header('Location: ../src/signup.php');
        } else {
            $user = new User($username, $name, $pwd, $email);
            $result = $user->exists();

            if($result["success"]) {
                if($result["data"]) {
                    $_SESSION['registrationError'] = 'Съществува потребител с въведеното потребителско име.';
                    header('Location: ../src/signup.php');
                } else {
                    if(!$user->createUser()) {
                        $_SESSION['registrationError'] = 'Възникна неочакван проблем...';
                        header('Location: ../src/signup.php');
                    } else {
                        // $_SESSION['registrationSuccess'] = 'Успешно се регистрирахте';
                        session_destroy();
                        header('Location: ../src/login.php');
                    }
                }
            } else {
                $_SESSION['registrationError'] = 'Възникна неочакван проблем...';
                header('Location: ../src/signup.php');
            }
        }
    }
?>