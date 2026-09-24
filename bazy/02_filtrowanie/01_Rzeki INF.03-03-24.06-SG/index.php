<?php
    $level_f = $_POST['level']?? NULL;

    if($level_f){
        echo "$level_f";
        // header("location: index.php");
    }
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
            <label for="all">Wszystkie</label>
            <input type="radio" name="level" id="warning" value="warning">
            <label for="warning">Ponad stan ostrzegawczy</label>
            <input type="radio" name="level" id="alarm" value="alarming">
            <label for="alarm">Ponad stan alarmowy</label>

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
                
                    <!-- skrypt -->
                

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