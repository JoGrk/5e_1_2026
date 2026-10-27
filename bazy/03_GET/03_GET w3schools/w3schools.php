<?php
    $link = new mysqli('localhost','root','','w3schools');
    $sql = "SELECT productid, productname, price
FROM products";
$result = $link -> query($sql);
$products = $result -> fetch_all(1);

    $p_id_G = $_GET['id']?? NULL;
    $p_name_G = $_GET['name']?? NULL;
    $p_price_G = $_GET['price']?? NULL;

    if($p_id_G && $p_name_G && $p_price_G){
        $sql = "SELECT productid, orderid, orderdate, quantity
                FROM orders
                INNER JOIN order_details USING(orderid)
                WHERE productid = $p_id_G";
        $result = $link -> query($sql);
        $orders = $result -> fetch_all(1);
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W3schools</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <aside>
        <ul>
            <!-- <li>
                <a href='w3schools.php?id={productid}&name={productname}&price={price}'>{productid}. {productname} - {price}</a>
            </li> -->
            <?php

                foreach($products as $product){
                    echo"
                        <li>
                            <a href='w3schools.php?id={$product['productid']}&name={$product['productname']}&price={$product['price']}'>{$product['productid']}. {$product['productname']} - {$product['price']}</a>
                        </li>
                    ";
                }

            ?>
            
            <!-- Skrypt 1 -->
        </ul>
    </aside>
    
    <main>
        <!-- <section class='block'>
            <h4>{orderdate} {quantity}</h4>
        </section> -->

        <?php
            if($p_id_G && $p_name_G && $p_price_G){
                foreach($orders as $order){
                    echo"<section class='block'>
                            <h4>{$order['orderdate']} {$order['quantity']}</h4>
                        </section>";
                }
            }
        ?>
    </main>
</body>
</html>
<?php
    $link -> close()
?>