<?php
class taskContr extends Task{

    public function create($user_id,$title,$description,$deadline){
        $this->createTask($user_id,$title,$description,$deadline);
    }

     public function update($task_id,$title,$description,$deadline){
        $this->editTask($task_id,$title,$description,$deadline);
    }
     public function delete($task_id){
        $this->deleteTask($task_id);
    }

}