<?php
    session_start();
    if(isset($_SESSION['licznik'])){
       $_SESSION['licznik'] += 1;

    }
    else{
        $_SESSION['licznik'] = 1;
    }

    

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         echo "<p>To jest strona 1</p>";
         echo "<p>Liczba odwiedzin w aplikacji: {$_SESSION['licznik']}</p>";
         
    ?>
    <a href="strona2.php">strona 2</a> <br><br>
    <a href="reset.php">reset</a>
</body>
</html>