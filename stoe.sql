CREATE TABLE `users` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `created_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `test`.`tasks` (`id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `title` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `due_date` DATE NULL , `is_done` BIT NOT NULL DEFAULT b'0' , `created_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB; 


CREATE TABLE `users` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`));                                                                                                    
                CREATE TABLE `tasks` (`id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `title` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `due_date` DATE NULL , `is_done` BIT NOT NULL DEFAULT b'0' , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)); 
                ALTER TABLE tasks ADD CONSTRAINT fk_tasks_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE



                -- TODO
                the includes act like middlewares as they sit between reuest and controllers, they act like filters
                move the data verification and validation to the middlewares
                use CSRF(Cross-Site Request Forgery) token to avoid the execution of unwanted actions on a trusted website when the user is authenticated
                use random_bytes() and encode it with bin2hex()
                You don't need a constructor function for most classes ,unless you want properties to be  
                Its preferable to pass the value of the form to the methods and not class(no constructor)
