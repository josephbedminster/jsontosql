# Insert multiple entries from a JSON file in SQL base
##### .json to .sql (php)

To run the program :
```sh
$ php jsontosql.php
```

You can modify the `jsontosql.php` file to customize input file, output file, database name and table name.
> `INSERT INTO database.table (ID, NAME, FULLNAME, ADDRESS) VALUES (NULL, 'Lee', 'Lee Alexis', '3 rue du parc, 75001 Paris, France');`

You can easily change this by changing one line in the script :
> `$sql = "INSERT INTO $database.$table (ID, NAME, FULLNAME, ADDRESS) VALUES (NULL, '$name', '$fullname', '$address');\n";`



##### .json to .sql (php-CLI)
In addition there is a CLI version in which you can enter all the parameters in your terminal.
To run the program :
```sh
$ php jsontosql-cli.php
```