<?php
    include_once 'header.php'
?>


<section class="signup-form">
    <h2>Sign up</h2>
<form action="../includes/signup.inc.php" name='signup' method="post">
    <?php
        session_start();

        if(isset($_SESSION['registrationError']) && 
           $_SESSION['registrationError']) {
           
            echo '<label class="error">' . $_SESSION['registrationError'] . '</label>';
            $_SESSION['registrationError'] = '';
        }

        // if(isset($_SESSION['registrationSuccess']) && 
        //    $_SESSION['registrationSuccess']) {
           
        //     echo '<label class="success">' . $_SESSION['registrationSuccess'] . '</label>';
        //     $_SESSION['registrationSuccess'] = '';
        // }
    ?>
    <div>
    <input type="text" name="name" placeholder="full name">
    </div>
    <div>
    <input type="email" name="email" placeholder="email@email.com">
    </div>
    <div>
    <input type="text" name="username" placeholder="user42">
    </div>
    <div>
    <input type="password" name="pwd" placeholder="password">
    </div>
    <div>
    <input type="password" name="pwdrepeat" placeholder="repeat password">
    </div>    
    

    <button type="submit" name="submit">Sign up</button>
</form>
</section>


<?php
include_once "footer.php"

?>