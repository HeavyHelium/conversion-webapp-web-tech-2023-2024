<?php
    include_once 'header.php'
?>


<section class="signup-form">
    <h2>Sign up</h2>
<form action="includes/signup.inc.php" method="post">
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