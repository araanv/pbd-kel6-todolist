<?php

require_once _DIR_ . '/Entity/Todolist.php';
require_once _DIR_ . '/Helper/InputHelper.php';
require_once _DIR_ . '/Repository/TodolistRepository.php';
require_once _DIR_ . '/Service/TodolistService.php';
require_once _DIR_ . '/View/TodolistView.php';
require_once _DIR_ . '/Config/Database.php';

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

echo "Aplikasi Todolist" . PHP_EOL;

$connection = \Config\Database::getConnection();
$todolistRepository = new TodolistRepositoryImpl($connection);
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolistView = new TodolistView($todolistService);

$todolistView->showTodolist();