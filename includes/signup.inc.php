<?php

include_once "../classes/signup.classes.php";
include_once "../classes/signup-contr.classes.php";


if(isset($_POST["submit"])) {
    // Get the data
    $uid = $_POST["submit"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    $signup = new SignupContr($uid, $pwd, 
                              $pwdRepeat, $email);
    // Instantiate SignupContr class
    // Running error handler and user signup
    // going back to front page
}