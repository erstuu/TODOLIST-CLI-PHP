<?php

namespace Repository 
{
    use Entity\TodoList;

    interface TodoListRepository 
    {
        function save(ToDoList $todoList): void;
        function remove(int $number): bool;
        function findAll(): array;
    }

    class TodoListRepositoryImpl implements TodoListRepository
    {
        public array $todolist = array();

        function save(TodoList $todoList): void 
        {
            $number = sizeof($this->todolist) + 1;
            $this->todolist[$number] = $todoList;
        }

        function remove(int $number): bool
        {
            if($number > sizeOf($this->todolist)) {
                return false;
            }
        
            for($i = $number; $i < sizeof($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i + 1];
            }
        
            unset($this->todolist[sizeof($this->todolist)]);

            return true;
        }

        function findAll(): array
        {
            return $this->todolist;
        }
    }
}