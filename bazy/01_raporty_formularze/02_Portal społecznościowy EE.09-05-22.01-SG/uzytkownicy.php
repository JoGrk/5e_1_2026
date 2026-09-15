<?php

    $link = new mysqli('localhost','root','','5e_1_portal');
    $sql ="SELECT COUNT(*) AS liczba FROM dane;";
    $result = $link -> query($sql);
    $number = $result -> fetch_assoc();

    $login_f = $_POST['login']?? null;
    $password_f = $_POST['password']??null;
    
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title> <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section class="b-left">
            <h2>Nasze osiedle</h2>
        </section>

        <section class="b-right">
            <!-- script 1 -->

        <h5>liczba użytkowników portalu <?= $number['liczba']?> </h5>

        </section>
    </header>
    
    <main>
        <section class="m-left">
            <h3>Logowanie</h3>
            <form action="" method="post">
                <label for="login">Login</label><br>
                <input type="text" name="login" id="login"><br>
                <label for="password">Hasło</label><br>
                <input type="password" name="password" id="password"><br>
                <button>Zaloguj</button>
            </form>
        </section>

        <section class="m-right">
            <h3>
                Wizytówka
            </h3>

            <section class="card">
                <!-- efekt działania skryptu 2  -->
                 <?php
                if($login_f && $password_f){
                    $sql ="select haslo from uzytkownicy where login= '$login_f'";
                    $result = $link -> query($sql);
                    if($result -> num_rows == 0){
                        echo "login nie istnieje";
                    }
                    else{
                        // login istnieje
                        $password_b = $result -> fetch_assoc();
                        $password_b = $password_b['haslo'];
                        
                        if($password_b != sha1($password_f)){
                            echo "hasło nieprawidłowe";
                        }
                        else{
                            // hasła się zgadzają
                            $sql ="SELECT login, rok_urodz, przyjaciol, hobby, zdjecie
                                    FROM uzytkownicy
                                        INNER JOIN dane ON uzytkownicy.id = dane.id
                                    WHERE login = '$login_f';";
                            $result = $link -> query($sql);
                            $data = $result -> fetch_assoc();
                            $age = 
                        }
                    };
                    
                }
                 ?>

                 <img src='zdjecie' alt='osoba'>
                 <h4>login(age)</h4>
                 <p>hobby:</p>
                 <h1>
                    <img src='' alt="">
                 </h1>
            </section>
        </section>
    </main>

    <footer>
        Stronę wykonał: xyz
    </footer>
</body>
</html>

<?php

    $link -> close();

?>