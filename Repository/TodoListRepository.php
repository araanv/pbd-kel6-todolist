<?php

namespace Repository {

    use Entity\Todolist;

    interface TodolistRepository
    {
        function save(TodoList $todoList): void;

        function remove(int $number): bool;

        function findAll(): array;

    }

    class TodolistRepositoryimpl implements todoListRepository {

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
//            if ($number > sizeof($this->todolist)) {
//                return false;
//            }
//
//            for ($i = $number; $i < sizeof($this->todolist); $i++) {
//                $this->todolist[$i] = $this->todolist[$i + 1];
//            }
//
//            unset($this->todolist[sizeof($this->todolist)]);
//
//            return true;

            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                // todolist ada
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                // todolist tidak ada
                return false;
            }
        }

        function findAll(): array
        {
            // return $this->todolist;
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todolist = new Todolist();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);

                $result[] = $todolist;
            }

            return $result;
        }
    }
}