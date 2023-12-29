<?php

class WorkerProf extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {
            $worker = new Worker;
            $user = new User;
            $id = $_GET['id'];
            // show($id);
            $arr['id'] = $id;
            $result = $worker->first($arr);
            $data['data'] = $result;

//            if (!empty($data['data'])) {
//                $worker_name = $data['data'][0]->name;
//            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $worker->delete($arr);
                unset($arr["id"]);
                $arr["username"]= $result["email"];
                $user->delete($arr);
                redirect("admin/workers2");
            }

            $this->view('admin/workerprof', $data);
        }
    }

}