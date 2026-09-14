<?php
    $link = new mysqli('localhost','root','','5e_1_hurtownia');
    $sql = "SELECT
                Zdjecie,
                Imie,
                Opinia
            FROM Klienci
                INNER JOIN Opinie ON Opinie.Klienci_ID = Klienci.ID
            WHERE Typy_ID = 2 OR Typy_ID = 3;";
    $result = $link -> query($sql);
    $customers = $result -> fetch_all(1);


    $sql = "SELECT
                imie,
                nazwisko,
                punkty
            FROM Klienci
            ORDER BY punkty DESC
            LIMIT 3";
    $result = $link ->  query($sql);
    $toppers = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>

    <main>
        <h2>Opinie naszych klientów</h2>
        <!-- skrypt 1 -->

        <?php
            foreach($customers as $customer){
                echo "
                    <section class='review'>
                        <img src='{$customer['Zdjecie']}' alt='klient'>

                        <blockquote>
                            {$customer['Opinia']}
                        </blockquote>

                        <h4>{$customer['Imie']}</h4>
                    </section>
                ";
            };
        ?>

        <!-- <section class='review'>
            <img src='[Zdjecie]' alt='klient'>

            <blockquote>
                [Opinia]
            </blockquote>

            <h4>[Imie]</h4>
        </section> -->

    </main>

    <footer>
        <section class="ft">
            <h3>Współpracują z nami</h3>
            <a href="http://sklep.pl/">Sklep 1</a>
        </section>


        <section class="ft">
            <h3>Nasi top klienci</h3>
            <ol>
                <!-- Skrypt 2 --> 

                <!-- <li> [imie] [nazwisko], [punkty] pkt</li> -->
                <?php
                    foreach($toppers as $topper){
                        echo"
                            <li> {$topper['imie']} {$topper['nazwisko']}, {$topper['punkty']} pkt</li>
                        ";
                    }
                ?>
                
            </ol>
        </section>


        <section class="ft">
            <h3>Skontaktuj się</h3>
            <p>telefon: 111222333</p>
        </section>


        <section class="ft">
            <h3>Autor: XYZ</h3>
        </section>
    </footer>


</body>
</html>
<?php
$link -> close();
?>