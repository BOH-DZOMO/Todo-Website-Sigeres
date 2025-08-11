<?php
class Dbh
{
    protected function connect()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=todo_sigeres";
            $pdo = new PDO($dsn, "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


            $tasksTableExists = $pdo->query("SHOW TABLES LIKE 'tasks'")->rowCount()>0;
            $userstableExists = $pdo->query("SHOW TABLES LIKE 'users'")->rowCount()>0;

            if (!$tasksTableExists || !$userstableExists) {
                $query = "CREATE TABLE `users` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`));                                                                                                    
                CREATE TABLE `tasks` (`id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `title` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `due_date` DATE NULL , `is_done` BIT NOT NULL DEFAULT b'0' , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)); 
                ALTER TABLE tasks ADD CONSTRAINT fk_tasks_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE";
                $pdo->exec($query);
            }

            return $pdo;
        } catch (PDOException $e) {
            echo $e->getCode() . "<br>";
            echo $e->getMessage() . "<br>";
            die();
        }
    }
}

