<?php
class TaskView extends Task
{

    public function read($task_id)
    {
        return $this->getTask($task_id);
    }

    public function readAll($user_id)
    {
        $data = $this->getAllTasks($user_id);
        // return $data;
        $c = 1;
        foreach ($data as $data => $value) {
            if ($value['is_done'] === 0) {
                $state = "To-do";
            } else {
                $state = "Completed";
            }
            echo "<table class='table'>
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
                    <tr>
                        <th scope='row'>$c</th>
                        <td>{$value['title']}</td>
                        <td>{$value['due_date']}</td>
                        <td><span class='state'>$state</span></td>
                        <td>
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
                        <button type='submit' class='btn btn-danger' name='complete_task'>Complete</button>
                        </form>
                        </td>
                    </tr>
                </tbody>
            </table>";
            $c+=1;
        }
    }
}
