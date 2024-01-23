<?php

require_once ("./header_logged.php");
require_once("../classes/user.php");

session_start();

$user = new User($_SESSION["username"]);

$profile_data = $user->historyUserQuery();

$columns = ["inputField", "configField", "outputField", "version", 
            "conversionType", "comment"];

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
            echo "<td>" . $row[$header] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

require_once("./footer.php");

?>