-- 1. Dodaj użytkowników:
-- A. Kasia, odpowiadająca za wprowadzanie danych o klientach, hasło 1234

CREATE USER 'Kasia1'@'localhost' IDENTIFIED BY '1234';

-- B. Jan - głównego mechanika wpisującego informacje o naprawach, hasło 1234

CREATE USER 'Jan1'@'localhost' IDENTIFIED BY '1234';

-- C. Kasjer - odpowiedzialnych za wystawianie rachunków, ale nie mogących wprowadzać zmian do bazy, hasło 1234

CREATE USER 'Kasjer'@'localhost' IDENTIFIED BY '1234';

-- 2. Utwórz perspektywę (widok)  KlienciKoszty (nazwa, adres, kwota, data_wpisu z tabeli rejestry pod nazwą data_rejestru) łączącą dane z tabel Klienci i Rejestry, która będzie potrzebna kasjerowi do pracy

CREATE VIEW kliencikoszty AS 
SELECT nazwa, adres, kwota, rejestry.data_wpisu as data_rejestru
FROM klienci
    INNER JOIN rejestry ON klienci.id = rejestry.klient;
 
-- 3. Ustal minimalny zestaw uprawnień dla utworzonych użytkowników, kierując się zasadą "im mniejsze uprawnienia, tym mniej można zepsuć"
-- A. Kasia, wszystkie prawa do tabeli Klienci

GRANT ALL ON 5e_1_komis.klienci TO 'Kasia1'@'localhost';

-- B. Jan - prawa do modyfikacji, dodawania i usuwania danych dla tabel operacje i rejestry oraz wyszukiwania dla wszystkich tabel w bazie

GRANT UPDATE, INSERT, DELETE ON 5e_1_komis.rejestry TO 'Jan1'@'localhost';

GRANT UPDATE, INSERT, DELETE ON 5e_1_komis.operacje TO 'Jan1'@'localhost';

GRANT SELECT ON 5e_1_komis.* TO 'Jan1'@'localhost';


-- C. Kasjer - prawa do przeszukiwania perspektywy KlienciKoszty

GRANT SELECT ON 5e_1_komis.KlienciKoszty TO Kasjer@'localhost';
 
-- 4. Utwórz nowego użytkownika uczendba z hasłem dostępu zaq1@WSX 

CREATE USER 'uczendba1'@'localhost' IDENTIFIED BY 'zaq1@WSX';

-- A. przypisz mu wszystkie uprawnienia do tabel Klienci i Handlowcy.

GRANT ALL ON 5e_1_komis.Klienci TO 'uczendba1'@'localhost';
GRANT ALL ON 5e_1_komis.Handlowcy TO 'uczendba1'@'localhost';

-- B. zabroń mu usuwania rekordów z tabeli Klienci 
REVOKE DELETE ON 5e_1_komis.Klienci FROM 'uczendba1'@'localhost';
-- C. odbierz uprawnienia wykonywania zapytań usuwania rekordów i modyfikowania wartości w tabeli Handlowcy
REVOKE UPDATE, DELETE ON 5e_1_komis.Handlowcy FROM 'uczendba1'@'localhost';

-- 5. Utwórz użytkowników jeden i dwa (bez hasła).

CREATE USER 'jeden1'@'localhost';
CREATE USER 'dwa1'@'localhost';



--  A. Nadaj uprawnienia wprowadzania, zmiany i usuwania danych w całej bazie komis dla użytkownika jeden

GRANT INSERT, UPDATE, DELETE ON 5e_1_komis.* TO 'jeden1'@'localhost';

-- B. nadaj wszystkie uprawnienia do tabeli Auta użytkownikowi dwa

GRANT ALL ON 5e_1_komis.auta TO 'dwa1'@'localhost';

-- C. odbierz użytkownikowi jeden prawa usuwania danych 
REVOKE DELETE ON 5e_1_komis.* FROM 'jeden1'@'localhost';
-- D. odbierz wszystkie uprawnienia użytkownikowi dwa do tabeli Auta

REVOKE ALL ON 5e_1_komis.auta FROM 'dwa1'@'localhost';

-- 6. 
-- A. Zaloguj się jako użytkownik jeden i ustaw hasło 'zaq1@WSX'
-- B. Ustaw hasło dla użytkownika dwa na 'zaq1@WSX'
-- C. z poziomu konta root zmień hasło dla użytkownika 