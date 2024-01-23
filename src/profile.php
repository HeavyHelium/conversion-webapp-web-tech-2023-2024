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

$config_placeholder = "input_format=properties (json) \noutput_format=json (properties)\nin=input_field\nout=output_field\nconfig=config_field\nskip_transform=true";

$config_name = "config(in properties format)";
$areas_nums = ["textArea1" => 1, "textArea2" => 2, "textArea3" => 3];

if($config_area == 1) {
    $area_1 = $config_name;
    $area_1_placeholder = $config_placeholder;
    $_SESSION['configArea'] = "textArea1";
} else if($config_area == 2  || 
          !isset($config_area) || !$config_area) {
    $area_2 = $config_name;
    $area_2_placeholder = $config_placeholder;
    $_SESSION['configArea'] = "textArea2";
} else {
    $area_3 = $config_name;
    $area_3_placeholder = $config_placeholder;
    $_SESSION['configArea'] = "textArea3";
}


function clearConvData() {
    global $_SESSION;  // Make sure to declare the variable as global
    $props = ["input", "output", "input_format", 
              "comment", "successfulConversion", 
              "conversionType", "output-converted", "config-error", 
              "config-warning"];

    foreach($props as $prop) {
        $_SESSION[$prop] = null;
    }
}



?>


<div class="conv-section">
    <div>
        <h1>JSON ↔ Properties</h1>
        <div></div>
        The config area is where you define your conversion type and input and output areas.
        The config area itself can be set there, but the change will be applied in the next conversion.
        Also, whereas the types of other fields can be set, the config area <strong>is always in properties format</strong>.
    </div>

    <form id="conversionForm" action="../includes/process_conversion.php" method="post">
    <?php

        // $_SESSION['input'] = $area_names_rev[$in];
        // $_SESSION['output'] = $area_names_rev[$out];
        // $_SESSION['input_format'] = $input_format;
        // $_SESSION['output_format'] = $output_format;
        // $_SESSION['configArea'] = $area_names_rev[$config];
        // $_SESSION['successfulConversion'] = true;
    
    ?>
    
    <label for="textArea1">Area 1: <?php echo $area_1?></label>
        <textarea id="textArea1" name="textArea1" rows="4" cols="50" placeholder="<?php echo $area_1_placeholder?>"><?php
            if(isset($_SESSION["output-converted"]) && 
               $_SESSION["output-converted"] && 
               $_SESSION["output"] == "textArea1") {
                echo $_SESSION["output-converted"];
                clearConvData();
            }
            ?></textarea>
        <!-- <label class="upload" for="upload1">Load file</label> -->
        <input id="upload1" type="file" name="uploadArea1">


        <label for="textArea2">Area 2: <?php echo $area_2?><?php ?></label>
        <textarea id="textArea2" rows="4" name="textArea2" cols="50" placeholder="<?php echo $area_2_placeholder?>"><?php
        if(isset($_SESSION["output-converted"]) && 
            $_SESSION["output-converted"] && 
            $_SESSION["output"] == "textArea2") {
            echo $_SESSION["output-converted"];
            clearConvData();
        }
        ?></textarea>
        <!-- <label class="upload" for="upload2">Load file</label> -->
        <input id="upload2" type="file" name="uploadArea2">

        <label for="textArea3">Area 3: <?php echo $area_3?></label>
        <textarea id="textArea3" rows="4" name="textArea3" cols="50" placeholder="<?php echo $area_3_placeholder?>"><?php
            
            if(isset($_SESSION["output-converted"]) && 
               $_SESSION["output-converted"] && 
               $_SESSION["output"] == "textArea3") {
                echo $_SESSION["output-converted"];
                clearConvData();
            }?></textarea>

        <!-- <label class="upload" for="upload3">Load file</label> -->
        <input id="upload3" type="file" name="uploadArea3">

        <label for="textArea4">Comment</label>
        <textarea id="textArea4" rows="4" cols="50" name="commentArea" placeholder="...any comment on the coversion"></textarea>


        <div></div>

        <label class="error"><?php
            if(isset($_SESSION["config-error"]) && $_SESSION["config-error"]) {
                echo $_SESSION["config-error"];
                $_SESSION["config-error"] = null;
            }?></label>

        <label class="warning"><?php
            if(isset($_SESSION["config-warning"]) && $_SESSION["config-warning"]) {
                echo $_SESSION["config-warning"];
                $_SESSION["config-warning"] = null;
            }
        ?></label>

        <button type="submit" name="submit">Convert</button>
    </form>
    
</div>



<?php

include_once "footer.php"
?>