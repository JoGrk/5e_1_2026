<?php
    session_start();
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
    
       if(isset($_SESSION['rola'])){
            if($_SESSION['rola'] == 'admin'){
                echo"
                
                    Witaj admin, masz pełne prawa
                
                ";
            }
            else{
                echo"
                
                    Witaj user, Twoje możliwości są ograniczone
                
                ";
            }
       }

    ?>

    <a href="login_sesja.php">login</a>

    <a href="wylogowywanie.php">Wyloguj</a>

</body>
</html>