<?php

    $link = new mysqli('localhost', 'root', '', '5e_1_rzeki');

    $level_f = $_POST['level']?? NULL;

    if($level_f){
        if($level_f == 'all'){
            $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
                    FROM wodowskazy
                        INNER JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id
                    WHERE dataPomiaru = '2022-05-05'";
        }
        if($level_f == 'warning'){
            $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
                    FROM wodowskazy
                        INNER JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id
                    WHERE dataPomiaru = '2022-05-05' AND stanWody > stanOstrzegawczy";
        }
        else{
            $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
                    FROM wodowskazy
                        INNER JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id
                    WHERE dataPomiaru = '2022-05-05' AND stanWody > stanAlarmowy";
        }
        $result = $link -> query($sql);
        $levels = $result -> fetch_all(1);
    }

    $sql = "SELECT dataPomiaru, AVG(stanWody) AS sredni_stanwody
            FROM pomiary
            GROUP by dataPomiaru;";
    $result = $link -> query($sql);
    $dates = $result -> fetch_all(1);


?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>poziom rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>
        <section class="hd-left">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>

        <section class="hd-right">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>
    
    <nav>
        <form action="" method="post">
            <input type="radio" name="level" id="all" value="all">
            <label for="all" class="level" >Wszystkie</label>
            <input type="radio" name="level" id="warning" value="warning">
            <label for="warning" class="level">Ponad stan ostrzegawczy</label>
            <input type="radio" name="level" id="alarm" value="alarming">
            <label for="alarm" class="level">Ponad stan alarmowy</label>

            <button>Pokaż</button>
        </form>
    </nav>

    <main>
        <section class="m-left">

            <h3>Stany na dzień 2022-05-05</h3>

            <table>

                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>

                <!-- SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody -->

                <!-- <tr>
                    <td>{nazwa}</td>
                    <td>{rzeka}</td>
                    <td>{stanOstrzegawczy}</td>
                    <td>{stanAlarmowy}</td>
                    <td>{stanWody}</td>
                </tr> -->
                
                    <!-- skrypt -->

                <?php
                    if($level_f){
                        foreach($levels as $level){
                            echo "
                                <tr>
                                    <td>{$level['nazwa']}</td>
                                    <td>{$level['rzeka']}</td>
                                    <td>{$level['stanOstrzegawczy']}</td>
                                    <td>{$level['stanAlarmowy']}</td>
                                    <td>{$level['stanWody']}</td>
                                </tr>
                            ";
                        };
                    }
                ?>
                

            </table>

        </section>

        <section class="m-right">
            <h3>Informacje</h3>

            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>

            <h3>Średnie stany wód</h3>

            <!-- ‒ Efekt działania skryptu 2 -->

            <!-- <p>{dataPomiaru}: {stanWody}</p> -->
            <!-- dataPomiaru, AVG(stanWody) AS sredni_stanwody -->
            <?php
                foreach($dates as $date){
                    echo"
                        <p>{$date['dataPomiaru']}: {$date['sredni_stanwody']}</p>
                        ";
                }
            ?>
            

            <a href="https://komunikaty.pl">Dowiedz się więcej</a>

            <img src="obraz2.jpg" alt="rzeka">

        </section>
    </main>

    <footer>
        <p>
            Stronę wykonał: 1234
        </p>
    </footer>


</body>
</html>

<?php
    $link -> close();
?>  