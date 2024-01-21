<?php

include_once "header_logged.php";
include_once "../classes/user.php";

session_start();

$user = new User($_SESSION["username"]);
$areas = $user->selectAreasQuery();

// $input_area = $areas['data']['inputField'];
// $output_area = $areas['data']['outputField'];
$config_area = $areas['data']['configField'];

$area_1 = "to be set";
$area_2 = "to be set";
$area_3 = "to be set";

$area_1_placeholder = "";
$area_2_placeholder = "";
$area_3_placeholder = "";

$config_placeholder = "input_format=properties (json) \noutput_format=json (properties)\nin=input_field\nout=output_field\nconf=config_field\nskip_transform=true";

$config_name = "config(in properties format)";


if($config_area == 1) {
    $area_1 = $config_name;
    $area_1_placeholder = $config_placeholder;
} else if($config_area == 2) {
    $area_2 = $config_name;
    $area_2_placeholder = $config_placeholder;
} else {
    $area_3 = $config_name;
    $area_3_placeholder = $config_placeholder;
}



?>
<div class=conv-section>
    <div><h1>JSON ↔ Properties</h1>
    <div></div>
    The config area is where you define your conversion type and input and output areas. 
    The config area itself can be set there, but the change will be applied in the next conversion. 
    Also, whereas the types of other fields can be set, the config area <strong>is always in properties format</strong>.
</div>
<label for="textArea1">Area 1: <?php echo $area_1?></label>
    <textarea id="textArea1" rows="4" cols="50" placeholder="<?php echo $area_1_placeholder?>"></textarea>

    <label for="textArea2">Area 2: <?php echo $area_2?><?php ?></label>
    <textarea id="textArea2" rows="4" cols="50" placeholder="<?php echo $area_2_placeholder?>"></textarea>

    <label for="textArea3">Area 3: <?php echo $area_3?></label>
    <textarea id="textArea3" rows="4" cols="50" placeholder="<?php echo $area_3_placeholder?>"></textarea>

    <label for="textArea4">Comment</label>
    <textarea id="textArea4" rows="4" cols="50" placeholder="...any comment on the coversion"></textarea>

    <div></div>

    <input type="file" id="uploadButton" accept=".properties, .json">

    <div></div>

    <button onclick="convertText()">Convert Text</button>
</div>
    

<?php

include_once "footer.php"
?>