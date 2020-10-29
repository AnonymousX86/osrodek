# Ośrodek

Projekt klasy 4J z przedmiotu programowanie aplikacji internetowych.

## Podstrony witryny:

Dane powinny być pobierane z bazy danych może za pomocą API przez JS lub za pomocą kodu PHP do JS, za pomocą którego
będzie można nimi łatwiej manipulować (przykładowo odfiltrować).

1. Informacje o ośrodku

1. Opis atrakcji turystycznych z odległością do nich

   Atrakcje będzie można filtrować ze względu na odległość.

1. Wydarzenia i promocje

1. Lista dostępnych pokoi
   - Udogodnienia.
   - Zdjęcia i opisy.
   - Kalendarz rezerwacji.

1. Panel administracyjny

   Różne konta będą miały różne uprawnienia.

   1. Klient
      - Rezerwowanie pokoi.
      - Wystawianie opinii (tylko jednej dla danego ośrodka).
      - usunięcie własnego konta.

   1. Pracownik
      - Dodawanie obiektów i informacji.
      - Możliwość "odniesienia się do oceny lub komentarza użytkownika".

   1. Administrator
      - Zarządzanie innymi użytkownikami.

1. Lista źródeł

   Wszystkie strony z linkami, skąd pochodzi które zdjęcie.

## Łączenie się z bazą danych

W związku z tym, że repozytorium jest publiczne, nie jest możliwe, aby dodać tutaj dane na temat łączenia się z
oryginalną bazą danych. Sam jej dostępny w pliku `MySQL_dump.sql`
([tutaj](https://github.com/AnonymousX86/osrodek/blob/master/MySQL_dump.sql)).

Aby uniknąć błędów, w lokalnym folderze `env` powinien znaleźć się plik `connect.php`, który deklaruje zmienną
`$mysqli`. Łączenie powinno się odbywać do lokalnej bazy danych wygenerowanej na podstawie pliku `MySQL_dump.sql`.

Zobacz widok relacji w [pliku `relations.png`](https://github.com/AnonymousX86/osrodek/blob/master/docs/img/relations.png).

