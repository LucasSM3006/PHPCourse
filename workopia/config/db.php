<?php
return
[
    'host' => '', // DB Host. IP or Localhost.
    'port' => '', // SQL port. Usually 3306 for mysql, unsure about pgres.
    'db_name' => '', // Name of db. I used workopia.
    'username' => '', // Username. Root, user1, etc.
    'password' => '' // User password.
];

/*

Our database structure is:
Two Databases.

listings, users.

listings relies on users, therefore we set it to cascade upon deletion.

listings has the following fields:

(Describe results from maria db, I used xampp for the project.)

+--------------+--------------+------+-----+---------------------+----------------+
| Field        | Type         | Null | Key | Default             | Extra          |
+--------------+--------------+------+-----+---------------------+----------------+
| id           | int(11)      | NO   | PRI | NULL                | auto_increment |
| user_id      | int(11)      | NO   | MUL | NULL                |                |
| title        | varchar(255) | NO   |     | NULL                |                |
| description  | longtext     | YES  |     | NULL                |                |
| salary       | varchar(45)  | YES  |     | NULL                |                |
| tags         | varchar(255) | YES  |     | NULL                |                |
| company      | varchar(255) | YES  |     | NULL                |                |
| address      | varchar(255) | YES  |     | NULL                |                |
| city         | varchar(255) | YES  |     | NULL                |                |
| state        | varchar(255) | YES  |     | NULL                |                |
| phone        | varchar(45)  | YES  |     | NULL                |                |
| email        | varchar(255) | YES  |     | NULL                |                |
| requirements | longtext     | YES  |     | NULL                |                |
| benefits     | longtext     | YES  |     | NULL                |                |
| created_at   | timestamp    | YES  |     | current_timestamp() |                |
+--------------+--------------+------+-----+---------------------+----------------+

users meanwhile looks like:

+------------+--------------+------+-----+---------------------+----------------+
| Field      | Type         | Null | Key | Default             | Extra          |
+------------+--------------+------+-----+---------------------+----------------+
| id         | int(11)      | NO   | PRI | NULL                | auto_increment |
| name       | varchar(255) | YES  |     | NULL                |                |
| email      | varchar(255) | NO   |     | NULL                |                |
| password   | varchar(255) | NO   |     | NULL                |                |
| city       | varchar(45)  | YES  |     | NULL                |                |
| state      | varchar(45)  | YES  |     | NULL                |                |
| created_at | timestamp    | YES  |     | current_timestamp() |                |
+------------+--------------+------+-----+---------------------+----------------+

so long as you create tables with the same names, the application will work as intended.

*/