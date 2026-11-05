<?php
     session_start();
    unset($_SESSION['uzytkownik']);

    session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Sesja została zakonczona</p>

    <a href="strona1.php">strona1</a>
    
</body>
</html>