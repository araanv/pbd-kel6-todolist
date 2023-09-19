<?php

namespace Repository {

    use Entity\Todolist;

    interface TodoListRepository
    {
        function save(TodoList $todoList): void;

        function remove(int $number): bool;

        function findAll(): array;

    }

    class TodoListRepositoryimpl implements todoListRepository {

        public array $todoList = array();

        private \PDO $connections;

        public function __construct(\PDO $connections)
        {
            $this->connections = $connections;
        }

        function save(TodoList $todoList): void 
        { 
            // $number = sizeof($this->todoList) + 1;
            // $this->todoList[$number] = $todoList;

            $sql = "INSERT INTO todoList(todo) VALUES (?)";
            $statement = $this->connections->prepare($sql);
            $statement->execute([$todoList->getTodo()]);
        }

        function remove(int $number): bool 
        {
            if($number > sizeof($this->todoList)) {
                return false;
            }

            for ($i = $number; $i < sizeof($this->todoList); $i++) {
                $this->todoList[$i] = $this->todoList[$i + i];
            }

            unset($this->todoList[sizeof($this->todoList)]);

            return true;
        }

        function findAll(): array 
        {
            return $this->todoList;
        }
    }
}