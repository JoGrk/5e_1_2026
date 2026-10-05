CREATE TABLE clients(
    name varchar(25),
    address varchar(25),
    city varchar(25),
    zip varchar(10),
    client_type varchar(4)
);
 
-- 1. Przekopiuj kod tworzący tabelę clients. Zakładamy, że tabela zawiera dane, dlatego zanim zaczniemy modyfikację, należy zrobić kopię zapasową tej tabeli. Zrób ją z poziomu wiersza poleceń.

CREATE TABLE clients_copy AS 
SELECT * 
FROM clients;
    


-- 2. Sprawdź działanie kopii zapasowej. Usuń tabelę i odtwórz korzystając z wiersza poleceń i przekierowania. 
 
-- 3. Dodaj do tabeli pole status - dwuznakowy tekst o stałej długości oraz pole state tego samego typu, oba pola nie mogą być puste.
 
-- 4. Za polem address dodaj address2 (255 znaków)
 
-- 5. Przesuń pole state tak, aby było za polem city 
  
-- 6. Dodaj na początku pole cust_id, całkowite, klucz podstawowy
 
-- 7. Zmień nazwę pola address na address1 jednocześnie zwiększając ilość znaków do 50
 
-- 8. Zmień nazwę pola status na active jednocześnie zmieniając jego typ: powinien być to typ wyliczeniowy (enum) o dwóch wartościach 'AC' oraz 'IA'
 
-- 9. Zakładamy, że w tabeli mamy (dużo) danych. Decydujemy zmienić typ pola activ i wartości na 'yes' dla 'AC' oraz 'no' dla 'IA'. (najpierw zmień typ poszerzając wartości enum, potem zmień dane w tabeli, potem zmień typu enum zawężając wartości)
 
-- 10. Usuń pole client_type
 
-- 11.Ustaw domyślną wartość state na 'LA' oraz domyślną wartość city na 'New Orleans'
 
-- 12. dodaj więzy: dopuszczalne wartości pola state to LA, CO, KY,CA
 
-- 13. Dodaj więzy: wartości w polu zip nie mogą się powtarzać.
 
-- 14. Jednak chcemy, aby wartosci w polu zip się powtarzały.
 
-- 15. usuń domyślną wartość dla city
 
-- 16. Zmień nazwę pola cust_id na client_id.
 
-- 17. Czy mamy jakieś indeksy w tabeli? 
 
-- 18. Dodaj index na polu city
 
-- 19. Dodaj unikatowy index na polu name
 
-- 20. Utwórz index na polach address1 i address2
 
-- 21. Zmień nazwę tabeli clients na client_addresses
 
-- 22. Usuń index z pól address1 i address2
 
-- 23. Przenieś tabelę client_addresses do dowolnej innej bazy danych