-- A. wybiera wszystkie towary (ProductID, ProduktName, Price)

SELECT productid, productname, price
FROM products;

-- B wybiera wszystkie zamówienia towaru o id 1 (ProductID): OrderID, Quantity

SELECT productid, orderid, orderdate, quantity
FROM orders
INNER JOIN order_details USING(orderid)
WHERE productid = 1;

-- C. wybiera wszystkie towary (ProductID, ProduktName, Price) o cenie pomiędzy 10 a 100