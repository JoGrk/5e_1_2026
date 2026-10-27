<?php
$link=new mysqli('localhost','root','','5e_1_matura');

$sql="SELECT DISTINCT przedmiot
FROM arkusz;";
$result=$link->query($sql);
$subjects=$result->fetch_all(1);

$sql = "SELECT min(rok) as min_rok, max(rok) as max_rok
        FROM arkusz";
$result = $link -> query($sql);
$years = $result->fetch_all(1);

$sql = "SELECT maturzysta_id, ROUND(AVG(punkty)) AS wynik
        FROM wynik
        GROUP BY maturzysta_id
        ORDER BY wynik DESC
        LIMIT 1";
$result = $link -> query($sql);
$best = $result -> fetch_assoc();

$sql = "SELECT maturzysta_id, ROUND(AVG(punkty)) AS wynik
        FROM wynik
        GROUP BY maturzysta_id
        ORDER BY wynik ASC
        LIMIT 1";
$result = $link -> query($sql);
$worst = $result -> fetch_assoc();

$sql ="SELECT id, imie, nazwisko
        FROM maturzysta
        WHERE szkola = 'T3'
        ORDER BY nazwisko DESC;";
$result = $link -> query($sql);
$students = $result -> fetch_all(1);


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

            <h3>
                Wybierz ucznia z listy:
            </h3>

            <!-- 
            <a href='wynik.php?student-id={['id']}&first-name={['imie']}& last-name={['nazwisko']}'>
                {['id']}.{['imie']} {['nazwisko']}
            </a><br> -->



            <?php
                foreach($students as $student){
                    echo"<a href='wynik.php?student-id={$student['id']}&first-name={$student['imie']}&last-name={$student['nazwisko']}'>{$student['id']}.{$student['imie']} {$student['nazwisko']}</a><br>";
                }
            ?>  
            <!-- − Efekt działania skryptu 2 -->

        </section>

        <section class="second">

            <div class="info">

                <h4>Przedmioty</h4>

                <?php
                    foreach($subjects as $subject){
                        echo"{$subject['przedmiot']} ";
                            
                        
                    }

                ?>

                <!-- sktypt1 -->

            </div>

            <div class="info">

                <h4>Lata</h4>

                <?php
                    foreach($years as $year){
                        echo "{$year['min_rok']} -
                            {$year['max_rok']}";
                    }
                ?>

                <!-- sktypt1 -->

            </div>

            <div class="info">

                <h4>Najlepszy wynik</h4>

                <?php
                    echo"{$best['wynik']}%"
                ?>
                <!-- sktypt1 -->

            </div>

            <div class="info">

                <h4>Najgorszy wynik</h4>

                <?php
                    echo"{$worst['wynik']}%"
                ?>

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