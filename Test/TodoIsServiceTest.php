<?php

require_once __DIR__ . "/../Entity/TodoList.php";
require_once __DIR__ . "/../Repository/TodoListRepository.php";
require_once __DIR__ . "/../service/TodoListService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\TodoList;
use Service\TodoListServiceImpl;
use Repository\TodoListRepositoryImpl;

function testShowTodoList(): void 
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListRepository->todoList[1] = new TodoList("Belajar php");
    $todoListRepository->todoList[2] = new Todolist("Belajar php OOP");
    $todoListRepository->todoList[3] = new Todolist("Belajar PHP Database");

    $todoListService = new TodoListServiceImpl($todoListRepository);

    $todoListService->testShowTodoList();
}

function testAddTodoList(): void 
{
    $connection = \config\Database::getConnection();
    $todoListRepository = new TodoListRepositoryImpl();

    $todoListService = new TodoListRepositoryImpl();
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP OOP");
    $todoListService->addTodoList("Belajar PHP Database");

    $todoListService->showTodoList();
}

function testRemoveTodoList(): void 
{
    $todoListRepository = new TodoListRepositoryImpl();

    $todoListService = new TodoListServiceImpl();
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP OOP");
    $todoListService->addTodoList("Belajar PHP Database");

    $todoListService->showTodoList();

    $todoListService->removeTodoList(1);
    $todoListService->showTodolist();

    $todoListService->removeTodoList(4);
    $todoListService->ShowTodoList();

    $todoListService->removeTodoList(2);
    $todoListService->showTodolist();


    $todoListService->removeTodoList(1);
    $todoListService->showTodoList();

}

testRemoveTodoList();