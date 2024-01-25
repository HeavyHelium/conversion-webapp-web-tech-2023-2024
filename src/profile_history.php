<?php

require_once ("./header_logged.php");
require_once("../classes/user.php");

session_start();

$user = new User($_SESSION["username"]);

$profile_data = $user->historyUserQuery();

$columns = ["inputField", "configField", "outputField", "version", 
            "conversionType", "comment", "output", "config", "input"];

if(!$profile_data["success"]) {
    header("Location: ./profile.php");
} else {
    $resultArray = $profile_data["data"];
     
    echo "<table>";

    echo "<tr>";
    foreach ($columns as $header) {
        echo "<th><strong>$header</strong></th>";
    }
    echo "</tr>";

    foreach ($resultArray as $row) {
        
        echo "<tr>";
        foreach ($columns as $header) {
            if ($header == "output") {
                echo "<form method='post' action='./view_output.php'>";
                echo "<input type='hidden' name='output' value='" . "true" . "' />";
                echo "<input type='hidden' name='version' value='" . $row['version'] . "' />";
                echo "<td><input class='button-view' type='submit' value='View Output'></td>";
                echo "</form>";
            } else if($header == "input") {
                echo "<form method='post' action='./view_output.php'>";
                echo "<input type='hidden' name='input' value='" . "true" . "' />";
                echo "<input type='hidden' name='version' value='" . $row['version'] . "' />";
                echo "<td><input class='button-view' type='submit' value='View Input'></td>";
                echo "</form>";
            } else if($header == "config") {
                echo "<form method='post' action='./view_output.php'>";
                echo "<input type='hidden' name='config' value='" . "true" . "' />";
                echo "<input type='hidden' name='version' value='" . $row['version'] . "' />";
                echo "<td><input class='button-view' type='submit' value='View Config'></td>";
                echo "</form>";
            } else {
                echo "<td>" . $row[$header] . "</td>";
            }
        }

        
        echo "</tr>";

    }

    echo "</table>";

}

require_once("./footer.php");

?>
