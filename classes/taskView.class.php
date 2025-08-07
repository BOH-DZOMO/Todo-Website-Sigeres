<?php
class TaskView extends Task{

        public function read($task_id){
        $this->getTask($task_id);
    }
        public function readAll(){
        $this->getAllTasks();
    }
}