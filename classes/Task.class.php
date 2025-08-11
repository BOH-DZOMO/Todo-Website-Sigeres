<?php
class Task extends Dbh
{
    // private $title;
    // private $description;
    // private $deadline;
    // private $create_;

    protected function createTask(int $user_id, string $title, string $description, string $deadline)
    {
        $query = "INSERT INTO `tasks`(`user_id`, `title`, `description`,`due_date`) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($user_id, $title, $description, $deadline));
        return $stmt;
        $stmt = null;
    }

    protected function editTask(int $task_id, string $title, string $description, string $deadline)
    {
        $query = "UPDATE `tasks` SET `title`=?, `description`=?,`due_date`=? WHERE id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($title, $description, $deadline, $task_id));
        return $stmt;
        $stmt = null;
    }

        protected function getTask(int $task_id)
    {
        $query = "SELECT * FROM `tasks` WHERE `id` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($task_id));
        return $stmt->fetchAll();
        $stmt = null;
    }

        protected function getAllTasks($user_id)
    {
        $query = "SELECT * FROM `tasks` WHERE user_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($user_id));
        return $stmt->fetchAll();
        $stmt = null;
    }
        protected function deleteTask(int $task_id)
    {
        $query = "DELETE FROM `tasks` WHERE id =?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($task_id));
        return $stmt;
        $stmt = null;
    }

    protected function set_complete(int $task_id)
    {
        $query = "UPDATE `tasks` SET `is_done`=1 WHERE id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($task_id));
        return $stmt;
        $stmt = null;
    }

    public function filter_by_date(string $start,string $end){
        $query= "SELECT * FROM `tasks` WHERE due_date BETWEEN ? AND  ?";
         $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($start,$end));
         return $stmt->fetchAll();
        $stmt = null;
    }
}
