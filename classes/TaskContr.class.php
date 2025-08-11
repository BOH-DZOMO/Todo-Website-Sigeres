<?php
class TaskContr extends Task{

    public function create($user_id,$title,$description,$deadline){
        if (empty($deadline)) {
            $date = new  DateTime();       
            $deadline =  $date->format("Y-m-d");
        }
        $this->createTask($user_id,$title,$description,$deadline);
         header("location: ../pages/list.php?post=success");
        exit();

    }

     public function update($task_id,$title,$description,$deadline){
        $this->editTask($task_id,$title,$description,$deadline);
        header("location: ../pages/list.php?update=success");
        exit();
    }
     public function delete($task_id){
        $this->deleteTask($task_id);
        header("location: ../pages/list.php?post=success");
        exit();
    }
     public function complete($task_id){
        $this->set_complete($task_id);
        header("location: ../pages/list.php?post=success");
        exit();
    }


    

}