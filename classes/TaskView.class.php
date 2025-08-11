<?php
class TaskView extends Task
{

    public function read($task_id)
    {
        return $this->getTask($task_id);
    }

    public function readAll($user_id,$start=null,$end=null)
    {
        $data = null;
        if (isset($start) && isset($end)) {
            $data = $this->filter_by_date($start,$end,$user_id);
        }
        else {
            $data = $this->getAllTasks($user_id);
        }
        // return $data;
        $c = 1;
        $cursor = null;
        echo "<table class='table' id='myTable'>
                <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Title</th>
                        <th scope='col'>Deadline</th>
                        <th scope='col'>Status</th>
                        <th scope='col'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                ";
        foreach ($data as $data => $value) {
            if ($value['is_done'] === 0) {
                $state = "<button type='button' class='btn btn-warning'>To-do</button>";
            } else {
                $state = "<button type='button' class='btn btn-success'>Completed</button>";
            }
            if ($value['is_done'] === 1) {
                $type = "button";
                $color = "secondary";
            }
            else {
                $type = "submit";
                $color = "success";
                $cursor = "cursor: none;";
            }
            echo " <tr>
                        <th scope='row'>$c</th>
                        <td>{$value['title']}</td>
                        <td>{$value['due_date']}</td>
                        <td><div class='d-flex justify-content-center'>$state</div></td>
                        <td>
                        <div class='action_bar'>
                        <form action='../pages/edit-page.php' method='post'>
                        <input type='hidden' name='task_id' value='{$value["id"]}' >
                        <button type='submit' class='btn btn-primary' name='edit_page'>Edit</button>
                        </form>
                        <form action='../includes/task.inc.php' method='post'>
                        <input type='hidden' name='task_id' value='{$value["id"]}'>
                        <button type='submit' class='btn btn-danger' id='delete' name='delete_task'>Delete</button>
                        </form>
                        <form action='../includes/task.inc.php' method='post'>
                        <input type='hidden' name='task_id' value='{$value["id"]}' >
                        <button type='$type' class='btn btn-$color' name='complete_task'>Complete</button>
                        </form>
                        </div>
                        </td>
                    </tr>
                    ";
            $c += 1;
        }
        echo " </tbody>
                </table>";
    }
        public function dashboard($user_id){
        $data = $this->getDashboardData($user_id);
        if (empty($data)) {
            $completed = 0;
            $todo = 0;
            $total = 0;
        }
        else {
            $completed = $data[1]["type"] ?? 0;
            $todo = $data[0]["type"] ?? 0;
            $total = $completed+$todo;
        }
        
        echo "<section>
                    <div class='card'>
                        <h4>Total Tasks</h4>
                        <p class='total_task text-dark'>$total</p>
                    </div>
                    <div class='card'>
                        <h4>Completed Tasks</h4>
                        <p class='completed_task text-success'>$completed</p>
                    </div>
                    <div class='card'>
                        <h4>Todo</h4>
                        <p class='todo text-warning'>$todo</p>
                    </div>
             </section>";
        }

}