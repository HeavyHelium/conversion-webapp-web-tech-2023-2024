<?php

require_once ("./header_logged.php");
require_once("../classes/user.php");

session_start();

$user = new User($_SESSION["username"]);

$profile_data = $user->historyUserQuery();

$columns = ["inputField", "configField", "outputField", "version", 
            "conversionType", "comment", "output"];

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
        echo "<form method='post' action='./view_output.php'>";
        echo "<tr>";
        foreach ($columns as $header) {
            if ($header == "output") {
                echo "<input type='hidden' name='version' value='" . $row['version'] . "' />";
            } else {
                echo "<td>" . $row[$header] . "</td>";
            }
        }

        echo "<td><input class='button-view' type='submit' value='View Output'></td>";
        echo "</tr>";
        echo "</form>";
    }

    echo "</table>";

}

require_once("./footer.php");

?>
