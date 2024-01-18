<?php

include_once "header_logged.php";
include_once "../classes/user.php";

session_start();

$user = new User($_SESSION["username"]);
$areas = $user->selectAreasQuery();

$input_area = $areas['data']['inputField'];
$output_area = $areas['data']['outputField'];
$config_area = $areas['data']['configField'];

$area_1 = "";
$area_2 = "";
$area_3 = "";

if($input_area == 1) {
    $area_1 = "input";
} else if($input_area == 2) {
    $area_2 = "input";
} else {
    $area_3 = "input";
}

if($output_area == 1) {
    $area_1 = "output";
} else if($output_area == 2) {
    $area_2 = "output";
} else {
    $area_3 = "output";
}

if($config_area == 1) {
    $area_1 = "config";
} else if($config_area == 2) {
    $area_2 = "config";
} else {
    $area_3 = "config";
}

?>
<div class=conv-section>
    <div><h1>JSON ↔ Properties</h1></div>
<label for="textArea1">Area 1: <?php echo $area_1?></label>
    <textarea id="textArea1" rows="4" cols="50"></textarea>

    <label for="textArea2">Area 2: <?php echo $area_2?><?php ?></label>
    <textarea id="textArea2" rows="4" cols="50"></textarea>

    <label for="textArea3">Area 3: <?php echo $area_3?></label>
    <textarea id="textArea3" rows="4" cols="50"></textarea>

    <br>

    <input type="file" id="uploadButton" accept=".txt">

    <br>

    <button onclick="convertText()">Convert Text</button>
</div>
    

<?php

include_once "footer.php"
?>