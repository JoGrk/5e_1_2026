<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    
       if(isset($_COOKIE['rola'])){
            if($_COOKIE['rola'] == 'admin'){
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

    <a href="login.php">login</a>

</body>
</html>