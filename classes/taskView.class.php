<?php
class TaskView extends Task{

        public function read($task_id){
        $this->getTask($task_id);
    }
        public function readAll(){
        $data = $this->getAllTasks();
        return $data;
        foreach ($data as $key => $value) {
            echo "$key => $value <br>";
            // echo `  <table class="table">
            //     <thead>
            //         <tr>
            //             <th scope="col">#</th>
            //             <th scope="col">Title</th>
            //             <th scope="col">Deadline</th>
            //             <th scope="col">Status</th>
            //             <th scope="col">Actions</th>
            //         </tr>
            //     </thead>
            //     <tbody>
            //         <tr>
            //             <th scope="row">1</th>
            //             <td>Mark</td>
            //             <td>Otto</td>
            //             <td>@mdo</td>
            //             <td>
            //                 <button type="button" class="btn btn-primary">Edit</button>
            //                 <button type="button" class="btn btn-danger">Delete</button>
            //                 <button type="button" class="btn btn-success">Complete</button>
            //             </td>
            //         </tr>
            //     </tbody>
            // </table>`;
        }
    }
}



          