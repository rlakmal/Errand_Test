<?php

class RecievedJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $recieved = new EmployerReqWorker;
            $id = $_SESSION['USER']->id;
            $arr['worker_id'] = $id;
            $results = $recieved->where($arr);
            $data['data'] = $results;
            $this->view('worker/recievedjobs', $data);
        }
        // echo "this is a about controller";

    }
}
