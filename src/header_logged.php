<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebConv</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <?php
    session_start();
    ?>
    <nav>
        <div class="wrapper">
            <a href="./profile.php"><img src="../images/logo.png" alt="logo"></a>
           <?php
            echo('<ul><li>' . 'Logged as <i>' . $_SESSION['name'] . '</i></li></ul>');
            ?>
            <ul>
                <li><a href="../src/profile.php"><strong>Converter</strong></a></li>
                <li><a href="../src/profile_history.php"><strong>Conversion History</strong></a></li>
                <li><a href="../includes/logout.inc.php"><strong>Log out</strong></a></li>
                
            </ul>
            
        </div>
    </nav>

    <div class="wrapper">
