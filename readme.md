Server Requirements:

* Apache
* mySql
* PHP >= 7.0.0
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

Install:

* git clone https://github.com/tsidex/api-server.git

* chmod -R 777 api-server

* cd api-server

* composer install 

* copy file (in root directory) ".env.example" to ".env"

* in new file ".env" update db connection settings

   DB_CONNECTION=mysql <br />
   DB_HOST=[HOTS TO DB] <br />
   DB_PORT=[PORT TO DB] <br />
   DB_DATABASE=[DATABASE NAME] <br />
   DB_USERNAME=[USERNAME TO DATABASE] <br />
   DB_PASSWORD=[PASSWORD TO DATABASE] <br />

* php artisan command:install

---------------------------------------------------

1. po instalaci vyčištěny nepotřebné soubory
2. nastavení nové adresářové struktury pro controllery
3. vytvořena db migrace a seeder
4. vytvořen model User
5. vytvořen model UserRepository + jeho metody
6. Vytvořeny controllery pro Api a pro Web
7. Vytvořeny metody pro controllery
8. Vytvořeny šablony
9. Vytvořeny routy
10. Uprava defaultních namespace pro controllery v kernelu
11. Úprava rout
12. Chybova hlaška 404 pro Api (response v jsonu)
13. Otestováno na serveru -> laravel v5.6 musí běžen na php 7.1
14. Downgrade celé aplikace na laravel v5.5 kvůli php 7.0
15. Tvorba vlastní command příkazu pro instalaci (v jednom commandu 3 příkazy)
16. Drobné úpravy <br />
---------------------------------------------------
<br /> API metody:<br />
Seznam uživatelů: GET [url]/api/user <br />
Jeden uživatel: GET [url]/api/user/{id} <br />
Přidání uživate: POST [url]/api <br />
<br />
Web url: <br />
Homepage: [url]/ <br />
Seznam uživatelů: [url]/user <br />
