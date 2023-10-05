<?php

// config inicial do db

$db = DatabaseManager::getInstance();

$db->exec("DROP TABLE IF EXISTS users");

$db->exec("CREATE TABLE IF NOT EXISTS users(
    id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    idade INT, 
    email VARCHAR(255));");

$db->exec("INSERT INTO users (name, idade, email) VALUES ('Pedro', 43 , 'pedro@gmail.com')");


$db->exec("INSERT INTO users (name, idade, email) VALUES ('Luiz', 23 , 'luiz@gmail.com')");



?>