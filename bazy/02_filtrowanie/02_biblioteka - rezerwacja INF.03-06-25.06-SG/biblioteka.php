<?php
    $link = new mysqli('localhost','root','','5e_1_biblioteka');

    $liryka_f = $_POST['liryka']?? NULL;
    if($liryka_f){
        $sql ="SELECT tytul
            FROM ksiazka
            WHERE id=$liryka_f";
        $result = $link -> query($sql);
        $book = $result -> fetch_assoc();

        $sql = "UPDATE ksiazka
                SET rezerwacja =1
                WHERE id=$liryka_f";
        $result = $link -> query($sql);
        // header('location: biblioteka.php');
    }

    $epika_f = $_POST['epika']?? NULL;
    if($epika_f){
        $sql ="SELECT tytul
            FROM ksiazka
            WHERE id=$epika_f";
        $result = $link -> query($sql);
        $book = $result -> fetch_assoc();

        $sql = "UPDATE ksiazka
                SET rezerwacja =1
                WHERE id=$epika_f";  
        $result = $link -> query($sql);      
        // header('location: biblioteka.php');
    }

    $dramat_f = $_POST['dramat']?? NULL;
    if($dramat_f){
        $sql ="SELECT tytul
            FROM ksiazka
            WHERE id=$dramat_f";
        $result = $link -> query($sql);
        $book = $result -> fetch_assoc();

        $sql = "UPDATE ksiazka
                SET rezerwacja =1
                WHERE id=$dramat_f";  
        $result = $link -> query($sql);     
        // header('location: biblioteka.php');
    }


    $sql ="SELECT id, tytul
            FROM ksiazka
            WHERE gatunek = 'liryka';";
    $result = $link -> query($sql);
    $l_titles = $result -> fetch_all(1);

    $sql ="SELECT id, tytul
            FROM ksiazka
            WHERE gatunek = 'epika';";
    $result = $link -> query($sql);
    $e_titles = $result -> fetch_all(1);

    $sql ="SELECT id, tytul
            FROM ksiazka
            WHERE gatunek = 'dramat';";
    $result = $link -> query($sql);
    $d_titles = $result -> fetch_all(1);

    $sql = "SELECT tytul, id_cz, wypozyczenia.data_odd
            FROM ksiazka
                INNER JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks
            ORDER BY wypozyczenia.data_odd ASC
            LIMIT 15";
    $result = $link -> query($sql);
    $orders = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title> <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>

        <!-- skrypt 1 -->

        <?php
            for($i=0; $i<20; $i++){
                echo"<img src='obraz.png' alt=''>";
            }
        ?>

    </header>

    <main>

        <section class="one">

            <h2>Liryka</h2>

            <form action="" method="post">

                <select name="liryka" id="liryka">

                    <!-- skrypt 2 -->
                     <!-- SELECT id, tytul -->
                        <!-- <option value='{id}'>{tytul}</option> -->
                         <?php
                            foreach($l_titles as $title){
                                echo "<option value='{$title['id']}'>{$title['tytul']}</option>";
                            }
                         ?>
                </select>

                <button>Rezerwuj</button>

            </form>

            <!-- skrypt 3 -->
             <!-- <p>Książka 'tytul' została zarezerwowana</p> -->
              <?php
                if($liryka_f){
                    echo"<p>Książka {$book['tytul']} została zarezerwowana</p>";
                }
              ?>



        </section>

        <section class="two">

            <h2>Epika</h2>

            <form action="" method="post">

                <select name="epika" id="epika">

                    <!-- skrypt 2 -->
                        <?php
                            foreach($e_titles as $title){
                                echo "<option value='{$title['id']}'>{$title['tytul']}</option>";
                            }
                         ?>
                </select>

                <button>Rezerwuj</button>

            </form>

            <!-- skrypt 3 -->
            <?php
                if($epika_f){
                echo"<p>Książka {$book['tytul']} została zarezerwowana</p>";
                }
            ?>
            
        </section>

        <section class="three">
            <h2>Dramat</h2>

            <form action="" method="post">

                <select name="dramat" id="dramat">

                    <!-- skrypt 2 -->
                       <?php
                            foreach($d_titles as $title){
                                echo "<option value='{$title['id']}'>{$title['tytul']}</option>";
                            }
                         ?>
                </select>

                <button>Rezerwuj</button>

            </form>

            <!-- skrypt 3 -->
                  <?php
                if($dramat_f){
                    echo"<p>Książka {$book['tytul']} została zarezerwowana</p>";
                }
              ?>
        </section>

        <section class="four">
            <h2>Zaległe książki</h2>
            <ul>
                <!-- <li>tytul id data_odd</li> -->
                <!-- skrypt 4 -->
                 <?php
                 foreach($orders as $order){
                    echo "<li>{$order['tytul']} {$order['id_cz']} {$order['data_odd']}</li>";
                 }


                ?>

            </ul>
        </section>

    </main>

    <footer>
        <p><strong>Autor: 1234567890</strong></p>
    </footer>
    
</body>
</html>
<?php
    $link->close();
?>
