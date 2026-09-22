<?php
    $link = new mysqli('localhost', 'root','','5e_1_antyki');
    $sql = "SELECT idmeble, nazwa, plik, styl, cena, opis
            FROM meble
            WHERE kategoria = 1";
    $result = $link -> query($sql);
    $furnitures_1a = $result -> fetch_all(1);

    $sql = "SELECT idmeble, nazwa, plik, styl, cena, opis
            FROM meble
            WHERE kategoria = 2";
    $result = $link -> query($sql);
    $furnitures_1b = $result -> fetch_all(1);

    $sql = "SELECT idmeble, nazwa, plik, styl, cena, opis
            FROM meble
            WHERE kategoria = 3";
    $result = $link -> query($sql);
    $furnitures_1c = $result -> fetch_all(1);

    $furn_f = $_POST['btn-mebel'] ?? NULL;
    if($button_f){
        $sql ="INSERT INTO zakupy
            (idklienci, idmeble, sztuk)
            VALUES
            (1, $furn_f, 1);";
        $result = $link -> query($sql);
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprzedaż antyków</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Najlepsze antyki w mieście</h1>
    </header>

    <main>
        <section>
            <h2>- Sofy -</h2>
            <!-- skrypt 1 wariant 1a -->
                <!-- <div class='mebel'>
                    <div class='obraz'>
                        <img src='sofy\{plik}' alt='mebel'>
                    </div>

                    <div class='informacje'>
                        <h3>{nazwa}</h3>
                        <h4>{styl}</h4>
                        <h3>Cena: {cena} zł</h3>
                        <form action='' method='post'>
                            <button name='btn-mebel' value='1'>KUP</button>
                        </form>
                    </div>

                    <div class='opis'>
                        {opis}
                    </div>
                </div> -->
                <?php
                    foreach($furnitures_1a AS $furn){
                        echo "
                                <div class='mebel'>
                            <div class='obraz'>
                                <img src='sofy/{$furn['plik']}' alt='mebel'>
                            </div>

                            <div class='informacje'>
                                <h3>{$furn['nazwa']}</h3>
                                <h4>{$furn['styl']}</h4>
                                <h3>Cena: {$furn['cena']} zł</h3>
                                <form action='' method='post'>
                                    <button name='btn-mebel' value='1'>KUP</button>
                                </form>
                            </div>
                            <div class='opis'>
                                {$furn['opis']}
                            </div>
                        </div>
                        ";
                    }
                ?>
             <h2>- Fotele - </h2>
             <!-- skrypt 1 wariant 1b -->
<?php
                    foreach($furnitures_1b AS $furn){
                        echo "
                                <div class='mebel'>
                            <div class='obraz'>
                                <img src='fotele/{$furn['plik']}' alt='mebel'>
                            </div>

                            <div class='informacje'>
                                <h3>{$furn['nazwa']}</h3>
                                <h4>{$furn['styl']}</h4>
                                <h3>Cena: {$furn['cena']} zł</h3>
                                <form action='' method='post'>
                                    <button name='btn-mebel' value='1'>KUP</button>
                                </form>
                            </div>
                            <div class='opis'>
                                {$furn['opis']}
                            </div>
                        </div>
                        ";
                    }
                ?>
             <h2>- Komody - </h2>
             <!-- skrypt 1 wariant 1c -->
<?php
                    foreach($furnitures_1c AS $furn){
                        echo "
                                <div class='mebel'>
                            <div class='obraz'>
                                <img src='komody/{$furn['plik']}' alt='mebel'>
                            </div>

                            <div class='informacje'>
                                <h3>{$furn['nazwa']}</h3>
                                <h4>{$furn['styl']}</h4>
                                <h3>Cena: {$furn['cena']} zł</h3>
                                <form action='' method='post'>
                                    <button name='btn-mebel' value='1'>KUP</button>
                                </form>
                            </div>
                            <div class='opis'>
                                {$furn['opis']}
                            </div>
                        </div>
                        ";
                    }
                ?>
             <!-- skrypt 2 -->
        </section>

        <aside>
            <h2>Koszyk</h2>
            <p>Zalogowano: Anna Kowalska</p>
            <!-- Skrypt 3 -->
        </aside>
    </main>

    <footer>
        <p>Stronę wykonał: XYZ</p>
    </footer>
</body>
</html>

<?php
    $link -> close();
?>