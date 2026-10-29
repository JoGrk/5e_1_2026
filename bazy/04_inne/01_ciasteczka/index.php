<?php
    setcookie('nazwa', 'witam na stronie', time()
    +10);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciasteczka</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['nazwa']))
            echo "<h3>{$_COOKIE['nazwa']}</h3>";

        if(!isset($_COOKIE['licznik'])){
           setcookie('licznik','1', time()+15);
        }
        else{
            $counter = $_COOKIE['licznik'];
            echo"<h3>$counter</h3>";
            $counter++;
            setcookie('licznik',$counter, time()+15);
        }
    ?>
</body>
</html>
