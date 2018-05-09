<?php

namespace App;

class BigTaskCollection {

    protected $tasks = [
        'App\Task1',
        'App\Task2',
        'App\Task3',
        'App\Task4',
        'App\Task5',
    ];

    public function doSomething()
    {
        foreach($this->tasks as $task)
        {
            $this->startTaskEvent($task);

            $task->handle(); // each task should has handle method

            $this->endTaskEvent($task);
        }
    }
}