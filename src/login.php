<?php
    include_once 'header.php'
?>


<section class="signup-form">
    <h2>Log in</h2>
<form action="../includes/login.inc.php" method="post">
    <?php
        session_start();

        if(isset($_SESSION['loginError']) && 
           $_SESSION['loginError']) {
           
            echo '<label class="error">' . $_SESSION['loginError'] . '</label>';
            $_SESSION['loginError'] = '';
            
        }
    ?>
    <div>
    <input type="text" name="username" placeholder="username/email">
    </div>
    <div>
    <input type="password" name="pwd" placeholder="password">
    </div>   
    <button type="submit" name="submit">Log in</button>
</form>
</section>


<?php
include_once "footer.php"

?>