<?php
$link = new mysqli('localhost','root','','5e_1_auta');
$sql ="SELECT
            model,
            rocznik,
            przebieg,
            paliwo,
            cena,
            zdjecie
        FROM samochody
        WHERE id = 10;";
    $result = $link -> query($sql);
    $dasauto = $result -> fetch_assoc();

$sql = "SELECT
            nazwa,
            model,
            rocznik,
            cena,
            zdjecie
        FROM Marki
            INNER JOIN Samochody ON Samochody.Marki_ID = Marki.id
        WHERE Wyrozniony = 1
        LIMIT 4";
    $result = $link -> query($sql);
    $cars = $result -> fetch_all(1);

    $sql = "SELECT
                nazwa
            FROM marki;";
    $result = $link -> query($sql);
    $models = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>

    <main class="one">

        <!-- efekt działania skryptu 1  -->

        <!-- <img src='{zdjecie}' alt='oferta dnia'>
        <h4>Oferta Dnia: Toyota {model}</h4>
        <p>Rocznik: {rocznik}, przebieg: {przebieg}, rodzaj paliwa: {paliwo}</p>
        <h4>Cena: {cena}</h4> -->

        <?php
            
                echo"
                
                    <img src='{$dasauto['zdjecie']}' alt='oferta dnia'>
                    <h4>Oferta Dnia: Toyota {$dasauto['model']}</h4>
                    <p>Rocznik: {$dasauto['rocznik']}, przebieg: {$dasauto['przebieg']}, rodzaj paliwa: {$dasauto['paliwo']}</p>
                    <h4>Cena: {$dasauto['cena']}</h4>

                ";
        
        ?>

    </main>

    <main class="two">

        <h2>Oferty Wyróżnione</h2>

        <!-- Efekt działania skryptu 2 -->

        <!-- <section>

            <img src='{zdjecie}' alt='{model}'>
            <h4>{nazwa} {model}</h4>
            <p>Rocznik: {rocznik}</p>
            <h4>Cena: {cena}</h4>

        </section> -->

        <?php

            foreach($cars AS $car){
                echo "
                <section class='ofert'>

                    <img src='{$car['zdjecie']}' alt='{$car['model']}'>
                    <h4>{$car['nazwa']} {$car['model']}</h4>
                    <p>Rocznik: {$car['rocznik']}</p>
                    <h4>Cena: {$car['cena']}</h4>

                </section>
                ";
            }

        ?>

    </main>

    <main class="three">

        <h2>Wybierz markę</h2>

        <form action="" method="post">


            <select name="mark" id="mark">

                <!-- <option value='{['nazwa']}'>{['nazwa']}</option> -->

                <?php
                
                    foreach($models AS $model){
                        echo"
                        
                            <option value='{$model['nazwa']}'>{$model['nazwa']}</option>

                        ";
                    }
                
                ?>

            </select>

            <button>Wyszukaj</button>

        </form>

        <!-- Efekt działania skryptu 4 -->

    </main>

    <footer>

        <p>Stronę wykonał: XYZ</p>

        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>

    </footer>
</body>
</html>
<?php
$link -> close();
?>