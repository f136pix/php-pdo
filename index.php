<?php
require_once 'db/Database.php';
require_once 'db/Database.manager.php';
require_once 'model/User.model.php';
require_once 'service/User.service.php';

require_once 'config/config.db.php';

$userService = new UserService();

// log sendo criado
$user = new User("Joao", 19, "joaoVitor@outlook.com");

$userService->createUser($user);
$userService->getAllUsers();



$user = new User("Marcos", 42, "marcos@gmail.com");

// desativando registro de logs
$userService->setQuery(false);
$userService -> createUser($user);


$user = new User("Fernando", 13, "fernando@gmail.com");
$userService->setQuery(true);
$userService->updateUser(1,$user);
$userService->getAllUsers();



?>