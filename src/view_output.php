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
        if(isset($_POST['output']) && $_POST["output"]) {
            echo '<textarea>' .  $res['data']['output'] . '</textarea>';    
            $_POST['output'] = null;
        } else if(isset($_POST['input']) && $_POST["input"]){
            echo '<textarea>' .  $res['data']['input'] . '</textarea>';    
            $_POST['input'] = null;
        } else if(isset($_POST['config']) && $_POST["config"]){
            echo '<textarea>' .  $res['data']['config'] . '</textarea>';    
            $_POST['config'] = null;
        }
        
    } else {
        echo "Something went wrong with getting the output...";
    }
?>

</div>



<?
include_once "./footer.php";
?>