Users Control
=============

in this work we are looking to create a crud in which you can list, edit, update and delete users.

### TOOLS:
- Botstrap 5
- Laravel
- MySQL

## start of work

- project creation, add these commands in the console:
    - laravel new UserControl.
    - add test pest and MySQL database.

- creating of the database in Clever Clound and registration in the env file.

- creating of the the migrations in the database/migrations file for creations of the tables in the database.
    - "php artisan make:model Country --migration" for creating the migration and model of the countries.
    - "php artisan make:migration add_more_attributes_to_users_table" to add more attributes to the user table.


![Creation of the taables Users and Countries with one-to-many relationship](https://cdn.discordapp.com/attachments/1253409082023608465/1315826768644542575/image.png?ex=6758d2ac&is=6757812c&hm=3e310d3c2b79d1aa56c9701ad9f1a73ca7cde23e50501378f0f1e1d02fcfd789&)


- now I configure the models to be able to handle the data in the requests to the database.

- controllers and services for executing the logic.
    -"php artisan make:controller UserController -r" and "php artisan make:controller CountryController -r"
    -"php artisan make:class Services/UserServices" and "php artisan make:class Services/CountryServices" 




with the rules that will have the attributes of each table.


