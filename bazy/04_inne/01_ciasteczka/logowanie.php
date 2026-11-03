<?php

    $name_f = $_POST['name']?? NULL;
    if($name_f){
        setcookie('name',$name_f, time()+60*60);
        setcookie('liczba', '0', time()+60*60);
        $count = 1;
        header('location:logowanie.php');
        // exit;
    }
    else {
        $count = $_COOKIE['liczba']+1;
        setcookie('liczba', $count, time()+60*60);
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
    
    <form action="" method="post">

        <input type="text" name="name" id="name" placeholder="Podaj Imie">

        <button>Wyślij</button>

    </form>


    <?php
        if(isset($_COOKIE['name'])){
            echo "Witaj użytkowniku {$_COOKIE['name']} jestes na naszej stronie $count raz";
        }

    ?>

    

</body>
</html>