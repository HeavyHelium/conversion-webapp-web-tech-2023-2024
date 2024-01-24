<?php 
include_once "./header_logged.php"
?>

<?php 

require_once("../classes/user.php");

session_start();

$user = new User($_SESSION["username"]);

$res = $user->selectConversionHistory($_POST["version"]);

?>

<div class="view-section">

<?php 
    if($res["success"]) {
        echo '<textarea>' .  $res['data']['output'] . '</textarea>';
    } else {
        echo "Something went wrong with getting the output...";
    }
?>

</div>



<?
include_once "./footer.php";
?>