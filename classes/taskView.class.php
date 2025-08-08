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
            $data = $this->filter_by_date($start,$end);
        }
        $data = $this->getAllTasks($user_id);
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
                        <input type='hidden' name='task_id' value='{$value["id"]}' >
                        <button type='submit' class='btn btn-danger' name='delete_task'>Delete</button>
                        </form>
                        <form action='../includes/task.inc.php' method='post'>
                        <input type='hidden' name='task_id' value='{$value["id"]}' >
                        <button type='$type' class='btn btn-$color' style='$cursor' name='complete_task'>Complete</button>
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
}
