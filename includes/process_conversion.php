<?php

require_once "testInputUtility.php";
require_once "../classes/properties_parser.php";
require_once "../classes/converter.php";
require_once "../classes/user.php";
require_once "../classes/transform.php";

session_start();

$configArea = testInput($_SESSION["configArea"]);
$area_values = ['area1', 'area2', 'area3'];
$area_enc = ['area1' => testInput($_POST['textArea1']), 
             'area2' => testInput($_POST['textArea2']), 
             'area3' => testInput($_POST['textArea3']), 
             'commentArea' => testInput($_POST['commentArea']), ];

$area_names = ['textArea1' => 'area1', 
             'textArea2' => 'area2', 
             'textArea3' => 'area3', 
             'commentArea' => 'area4', ];

$area_names_rev = ['area1' => 'textArea1', 
                   'area2' => 'textArea2', 
                   'area3' => 'textArea3', 
                   'area4' => 'commentArea', ];

$areas_nums = ["textArea1" => 1, "textArea2" => 2, "textArea3" => 3];
$format_values = ['json', 'properties'];


if(!isset($_POST[$configArea]) || strlen($_POST[$configArea]) == 0) {
    $_SESSION['config-error'] = "Config area cannot be empty!";
    header("Location: ../src/profile.php");
} else {
    try {
        $content_config = PropertiesParser::parseString($_POST[$configArea]);
        $input_format = $content_config["input_format"];
        $output_format = $content_config["output_format"];
        $out = $content_config["out"];
        $in = $content_config["in"];
        $config = isset($content_config["config"]) ? $content_config["config"] : $area_names[$_SESSION["configArea"]];

        if(!in_array($config, $area_values)) {
            $_SESSION['config-error'] = "When you specify future config area by setting the 'config' property!\n'in' it must be one of{area1, area2, area3}";
            header("Location: ../src/profile.php");
            exit();
        } 
        if(!isset($in) || !$in || !in_array($in, $area_values)) {
            $_SESSION['config-error'] = "You have to specify input area by setting the 'in' property!\n'in' is one of{area1, area2, area3}";
            header("Location: ../src/profile.php");
        } else if(!isset($out) || !$out || !in_array($out, $area_values)) {
            $_SESSION['config-error'] = "You have to specify output area by setting the 'out' property!\n'out' is one of{area1, area2, area3}";
            header("Location: ../src/profile.php");
        } else if(!isset($input_format) || !$input_format 
                  || !in_array($input_format, $format_values)) {
            $_SESSION['config-error'] = "You have to specify the input format value by setting the 'input_format' property!\n'input_format' is one of{json, properties}";
            header("Location: ../src/profile.php");
        } else if(!isset($output_format) || !$output_format 
                  || !in_array($output_format, $format_values)) {
            $_SESSION['config-error'] = "You have to specify the output format value by setting the 'output_format' property!\n'output_format' is one of{json, properties}";
            header("Location: ../src/profile.php");
        } else {
            // if(count($content_config) != 4) {
            //     $_SESSION['config-warning'] = "Transformations skipped! To be added in future release!";
            // }

            if($input_format == 'json') {
                $area_enc[$in] = str_replace('&quot;', '"',$area_enc[$in]);
                $parsed = json_decode($area_enc[$in], true);
                $parsed = applyTransformations($parsed, $content_config['transform']);  
                              
                if($input_format != $output_format) {

                    $_SESSION["output-converted"] = ObjectConverter::toProperties($parsed);
                    $_SESSION["conversionType"] = 'json2properties';
                } else {
                    $_SESSION["output-converted"] = ObjectConverter::toJson($parsed);
                    $_SESSION["output-converted"] = $_SESSION["output-converted"] == '[]' || 
                                                    $_SESSION["output-converted"] == "null"  || 
                                                    !($_SESSION['output-converted'])? "" : $_SESSION["output-converted"];
                    $_SESSION["conversionType"] = 'json2json';
                }
                // $parsed = applyTransformations($parsed, $content_config['transform']);     
            } else {
                $parsed = PropertiesParser::parseString($area_enc[$in]);
                $parsed = applyTransformations($parsed, $content_config['transform']);
                if($input_format != $output_format) {
                    
                    $_SESSION["output-converted"] = ObjectConverter::toJson($parsed);
                    $_SESSION["output-converted"] = $_SESSION["output-converted"] == '[]' || 
                                                    $_SESSION["output-converted"] == "null"  || 
                                                    !($_SESSION['output-converted'])? "" : $_SESSION["output-converted"];
                    $_SESSION["conversionType"] = 'properties2json';
                } else {
                    $_SESSION["output-converted"] = ObjectConverter::toProperties($parsed);
                    $_SESSION["conversionType"] = 'properties2properties';
                }

                // applyTransformations($parsed, $content_config['transform']);
            }
        }
            $_SESSION['transformations'] = $content_config['transform'];
            // var_dump($area_names_rev[$out]);
            $_SESSION['input'] = $area_names_rev[$in];
            $_SESSION['output'] = $area_names_rev[$out];
            $_SESSION['input_format'] = $input_format;
            $_SESSION['output_format'] = $output_format;
            $_SESSION['configArea'] = $area_names_rev[$config];
            $_SESSION['comment'] = $area_enc["commentArea"];
            $_SESSION['successfulConversion'] = true;

            // var_dump($_SESSION['input']);
            // var_dump($_SESSION['output']);
            // var_dump($_SESSION['input_format']);
            // var_dump($_SESSION['output_format']);
            // var_dump($_SESSION['configArea']);
            // var_dump($_SESSION['comment']);
            // var_dump($_SESSION['conversionType']);
            // var_dump($_SESSION['successfulConversion']);

            // var_dump($_SESSION['output-converted']);)

            $user = new User($_SESSION["username"]);
            
            if(isset($_SESSION["successfulConversion"]) && 
            $_SESSION["successfulConversion"]) {
                    $user->insertConversionHistory($areas_nums[$_SESSION['input']], 
                                                   $areas_nums[$_SESSION['output']], 
                                                   $areas_nums[$_SESSION['configArea']],
                                                   $_SESSION["conversionType"], 
                                                   $_SESSION["comment"], 
                                                   $_SESSION["output-converted"], 
                                                   $area_enc[$in], $_POST[$configArea]);
            
                header("Location: ../src/profile.php");
            }
        } catch (Exception $e) {
         $_SESSION['config-error'] = "Problem with parsing config area!" . $e->getMessage();
         header("Location: ../src/profile.php");
    }

}

?>


<!-- 
    
in=area1
out=area2
input_format=json
output_format=properties
tranform_skip=true 

-->


<!-- 
in=area2
out=area1
input_format=properties
output_format=json
tranform_skip=true  

-->


<!-- 
    
{
    "in": "area2",
    "out": "area1",
    "input_format": "properties",
    "output_format": "json",
    "tranform_skip": "true"
} 
-->


