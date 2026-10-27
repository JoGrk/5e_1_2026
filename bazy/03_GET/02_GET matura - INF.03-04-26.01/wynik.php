<?php

    $link=new mysqli('localhost','root','','5e_1_matura');

    $student_id_g = $_GET['student-id']?? NULL;
    $first_name_g = $_GET['first-name']?? NULL;
    $last_name_g = $_GET['last-name']?? NULL;
    // $Sname = $_GET?
    // var_dump($student_id_g);
    // var_dump($first_name_g);
    // var_dump($last_name_g);

    if($student_id_g && $first_name_g && $last_name_g){
        $sql = "SELECT rok, sesja, przedmiot, punkty
                FROM arkusz
                    INNER JOIN wynik ON arkusz.symbol = wynik.symbol
                WHERE maturzysta_id = $student_id_g";
        $result = $link -> query($sql);
        $student = $result ->  fetch_assoc();
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>

        <h1>System informacji dla maturzystów</h1>

    </header>

    <main>

        <aside>

            <img src="ma.jpg" alt="Matura">

            <img src="tu.jpg" alt="Matura">

            <img src="ra.jpg" alt="Matura">

        </aside>

        <section class="first">
            <!-- − Efekt działania skryptu 3 -->

            <!-- <h2>{['imie']} {['nazwisko']}</h2>

            <h3>{['rok']} {['sesja']}</h3>
            <p>{['przedmiot']} {['punkty']}</p> -->

            <!-- rok, sesja, przedmiot, punkty -->

            <?php

                if($student_id_g && $first_name_g && $last_name_g){
                    echo "
                    
                        <h2>$first_name_g $last_name_g</h2>

                        <h3>{$student['rok']} {$student['sesja']}</h3>

                        <p>{$student['przedmiot']} {$student['punkty']}</p>
                    
                    ";
                }
            ?>

        </section>

        <section class="second">

            <div class="info">

                <h4>Przedmioty</h4>

                <!-- sktypt1 -->

            </div>

            <div class="info">

                <h4>Lata</h4>

                <!-- sktypt1 -->

            </div>

            <div class="info">

                <h4>Najlepszy wynik</h4>

                <!-- sktypt1 -->

            </div>

            <div class="info">

                <h4>Najgorszy wynik</h4>

                <!-- sktypt1 -->

            </div>

        </section>

    </main>

    <footer>

        <p>Stronę wykonał: </p>

    </footer>
    
</body>
</html>

<?php
$link->close();
?>