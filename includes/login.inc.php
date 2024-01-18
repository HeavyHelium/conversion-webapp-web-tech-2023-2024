<?php

    require_once './testInputUtility.php';
    require_once '../classes/db_handler.php';
    require_once '../classes/user.php';

    session_start();
    $username = testInput($_POST['username']);
    $pwd = testInput($_POST['pwd']);

    if(!$name && !$pwd) {
        $_SESSION['loginError'] = "Въведете потребителско име и парола!";
        header('Location: ../src/login.php');
    } else if(!$username) {
        $_SESSION['loginError'] = "Въведете потребителско име!";
        header('Location: ../src/login.php');
    } else if(!$pwd) {
        $_SESSION['loginError'] = "Въведете парола!";
        header('Location: ../src/login.php');
    } else {
        $user = new User($username, $name, $pwd, $email);
        $result = $user->exists();

        if($result["success"]) { 
            
            if($result["data"]) {
                
                if(!password_verify($pwd, $result["data"]["passwd"])) {
                    $_SESSION['loginError'] = "Грешна парола!";
                    header('Location: ../src/login.php');
                } else {
                    $_SESSION['name'] = $result["data"]["name"]; 
                    $_SESSION['username'] = $result["data"]["username"];
                    $_SESSION['textAreas'] = $user->selectAreasQuery()['data'];
                    
                    header('Location: ../src/profile.php');
                }
            } else {
                $_SESSION['loginError'] = "Грешни данни!";
                header('Location: ../src/login.php');
            }
        } else {
             $_SESSION['loginError'] = "Възникна неочаквана грешка!";
             header('Location: ../src/login.php');
        }
    }
?>