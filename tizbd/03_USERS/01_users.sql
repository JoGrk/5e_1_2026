-- (wiersz poleceń)

-- 1. Dodaj nowego użytkownika kupiec łączącego się z lokalnej maszyny z hasłem kupiecE14
 
CREATE USER 'kupiec1'@'localhost' IDENTIFIED BY 'kupiecE14';

-- 2. Wykonaj testowe połączenie (zaloguj się) na koncie kupiec. Jakie bazy danych są widoczne?
 exit
 mysql -u kupiec1 -p
-- 3. jako root sprawdź zawartość tabeli user (tylko pola host, user, password) (w bazie danych mysql) (pokaż zawartość tej tabeli)
 SELECT host, user, password
 from user;
-- 4. Utwórz użytkownika szukacz z hasłem szukaczE14

CREATE USER 'szukacz1'@'localhost' IDENTIFIED BY 'szukaczE14';
 
-- 5. Wyloguj się z sesji kupca i wykonaj testowe połączenie jako szukacz

mysql -u szukacz1 -p

--  6. Utwórz
-- A. bazę danych Egzaminy
-- B. w tej bazie tabelę Test (pole id typu int, klucz podstawowy, bez autoinkrementacji). 
-- C. Dodaj do tabeli Test cyfry 1, 2 i 3 
-- D. Utwórz tabelę tabela z jednym polem id typu całkowitego.
 
CREATE DATABASE 5e_1_egzaminy;

CREATE TABLE Test(
    ID INT PRIMARY KEY
);

INSERT INTO test
VALUES
(1),
(2),
(3);

CREATE TABLE tabela(
    id int
);

-- 7. Daj kupcowi prawo do wprowadzania danych do tabeli test w bazie Egzaminy (samo wprowadzanie, bez wyszukiwania)
 
GRANT INSERT ON 5e_1_egzaminy.test TO 'kupiec1'@'localhost';

-- 8. Daj szukaczowi prawo do wyświetlania danych z tabeli test w bazie Egzaminy
 GRANT SELECT ON 5e_1_egzaminy.test TO 'szukacz1'@'localhost';
-- 9. Sprawdź, czy kupiec (prawo do wprowadzania danych):



-- A. widzi bazę Egzaminy
-- B. Może jej użyć
-- C. Widzi tabele w tej bazie
-- D. Może wyświetlić zawartość tabeli Test
-- E. Może dodać dane (liczbę 4)
 
-- 10. Sprawdź, czy szukacz (prawo do wyświetlania danych):
-- A. widzi bazę Egzaminy
-- B. Może jej użyć
-- C. Widzi tabele w tej bazie
-- D. Może wyświetlić zawartość tabeli Test
-- E. Może dodać dane (liczbę 5)
-- 11. Utwórz użytkownika serwisant
 
 CREATE USER 'serwisant1'@'localhost';

-- 12. Daj prawo serwisantowi do usuwania danych z tabeli test w bazie egzaminy (samo usuwanie, bez prawa do wyszukiwania).

GRANT DELETE ON 5e_1_egzaminy.test TO 'serwisant1'@'localhost';
 
-- 13. Sprawdź, czy serwisant (prawo do usuwania danych):
-- A. widzi bazę Egzaminy
-- B. Może jej użyć
-- C. Widzi tabele w tej bazie
-- D. Może wyświetlić zawartość tabeli Test
-- E. Może usunąć dane (liczbę 3)
-- F. Może usunąć wszystkie dane;

mysql -u serwisant1

DELETE FROM test
WHERE id = 3;



-- 14. Jeśli użytkownik serwisant ma problemy z usuwaniem, popraw to (ale nie dawaj mu za dużo praw, a już na pewno nie wszystkie), najpierw dodaj do tabeli liczby 1,2,3

GRANT SELECT ON 5e_1_egzaminy.test TO 'serwisant1'@'localhost';
 