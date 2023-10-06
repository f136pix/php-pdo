<?php
require_once 'db/Database.php';
require_once 'db/Database.manager.php';
require_once 'model/User.model.php';
require_once 'service/User.service.php';

require_once 'config/config.db.php';

$userService = new UserService();

// registro de logs = true
$user = new User("Joao", 19, "joaoVitor@outlook.com");
$userService->createUser($user);
$userService->getAllUsers();

// registro de logs = false
$userService->setQuery(false);
$user = new User("Marcos", 42, "marcos@gmail.com");
$userService -> createUser($user);

// registro de logs = true
$userService->setQuery(true);

// update id 1
$user = new User("Fernando", 13, "fernando@gmail.com");
$userService->updateUser(1,$user);
$userService->getAllUsers();

// delete id 1
$userService->deleteUser(1);
$userService->getAllUsers();



?>