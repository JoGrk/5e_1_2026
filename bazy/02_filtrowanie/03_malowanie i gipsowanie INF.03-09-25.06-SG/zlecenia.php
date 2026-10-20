<?php
    $link = new mysqli('localhost','root','','5e_1_remonty');

    $employees_f = $_POST['employees'] ?? NULL;
    
    if($employees_f){
        $sql = "SELECT nazwa_firmy, liczba_pracownikow 
                FROM wykonawcy
                WHERE liczba_pracownikow >= $employees_f;";
        $result = $link -> query($sql);
        $employees = $result -> fetch_all(1);
    }

    $sql = "SELECT DISTINCT miasto
            FROM klienci
            ORDER BY miasto ASC";
    $result = $link -> query($sql);
    $cities = $result -> fetch_all(1);

    $city_f = $_POST['city']?? NULL;
    $service_f = $_POST['service']?? NULL;

    if($city_f && $service_f){
        $sql = "SELECT imie, cena
                FROM zlecenia
                    INNER JOIN klienci ON zlecenia.id_klienta = klienci.id_klienta
                WHERE miasto = '$city_f'
                AND rodzaj = '$service_f';";
        $result = $link -> query($sql);
        $customers = $result -> fetch_all(1);
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>

        <h1>Malowanie i gipsowanie</h1>

    </header>

    <main>

        <nav>

            <a href="kontakt.html">Kontakt</a>

            <a href="https://remonty.pl" target="_blank" rel="noopener noreferrer">Partnerzy</a>

        </nav>

        <aside>

            <img src="tapeta_lewa.png" alt="usługi">

            <img src="tapeta_prawa.png" alt="usługi">

            <img src="tapeta_lewa.png" alt="usługi">

        </aside>

        <section class="left">

            <h2>Dla klientów</h2>

            <form action="" method="post">

                <label for="employees">Ilu co najmniej pracowników potrzebujesz?</label>
                <input type="number" name="employees" id="employees" step="1"> 
                <button>Szukaj firm </button>
            </form>
            <!-- skrypt 1 -->

            <!-- <p>{['firma']}, {['liczba_pracownikow']}</p> -->

            <?php
                if($employees_f){foreach($employees as $employee){
                                    echo"<p>{$employee['nazwa_firmy']}, {$employee['liczba_pracownikow']}</p>";
                                };
                }
                
            ?>

        </section>

        <section class="middle">

            <h2>Dla wykonawców</h2>

            <form action="" method="post">

                <select name="city" id="city">
                    <!-- skrypt2 -->
                     <!-- <option value='{['miasto']}'>{['miasto']}</option> -->
                    <?php

                        foreach($cities as $city){
                            echo "<option value='{$city['miasto']}'>{$city['miasto']}</option>";
                        }

                    ?>

                </select><br>

                <input type="radio" name="service" id="painting" value="malowanie"checked>
                <label for="painting">Malowanie</label><br>

                <input type="radio" name="service" id=plastering" value="gipsowanie">
                <label for="plastering">Gipswoanie</label><br>

                <button>Szukaj klientów</button>
                
            </form>
            
            <ul>
                
                <!-- <li>{imie} - {cena}</li> -->

                <?php

                    if($city_f && $service_f){
                        foreach($customers AS $customer){
                            echo"
                            
                                <li>{$customer['imie']} - {$customer['cena']}

                            ";
                        }
                    }

                ?>

            </ul>

        </section>

    </main>

    <footer>

        <p><strong>Stronę wykonał: Ktoś</strong></p>

    </footer>
    
</body>
</html>
<?php
    $link -> close();
?>