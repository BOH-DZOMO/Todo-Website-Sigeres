<?php
class Task extends Dbh
{
    // private $title;
    // private $description;
    // private $deadline;
    // private $create_;

    public function createTask(int $user_id, string $title, string $description, string $deadline)
    {
        $query = "INSERT INTO `tasks`(`user_id`, `title`, `description`,`due_date`) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($user_id, $title, $description, $deadline));
        return $stmt;
        $stmt = null;
    }

    public function editTask(int $task_id, string $title, string $description, string $deadline)
    {
        $query = "UPDATE `tasks` SET `title`=?, `description`=?,`due_date`=? WHERE id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($title, $description, $deadline, $task_id));
        return $stmt;
        $stmt = null;
    }

        public function getTask(int $task_id)
    {
        $query = "SELECT * FROM `tasks` WHERE `id` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($task_id));
        return $stmt->fetchAll();
        $stmt = null;
    }

        public function getAllTasks($user_id)
    {
        $query = "SELECT * FROM `tasks` WHERE user_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($user_id));
        return $stmt->fetchAll();
        $stmt = null;
    }
        public function deleteTask(int $task_id)
    {
        $query = "DELETE FROM `tasks` WHERE id =?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($task_id));
        return $stmt;
        $stmt = null;
    }

            public function set_complete(int $task_id)
    {
        $query = "UPDATE `tasks` SET `is_done`=1 WHERE id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(array($task_id));
        return $stmt;
        $stmt = null;
    }
}
