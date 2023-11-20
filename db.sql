CREATE TABLE users (
    id INT (11) NOT NULL AUTO_INCREMENT, 
    username VARCHAR(30) NOT NULL,
    pwd VARCHAR (255) NOT NULL, 
    email VARCHAR(100) NOT NULL, 
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
 );

--  this is the MySQL query that should be executed inside phpMyAdmin before configuring  includes/dbh.inc.php --