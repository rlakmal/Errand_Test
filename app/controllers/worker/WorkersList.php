<?php

class WorkersList extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $workers = new WorkerServices;
            $data = $this->getAllWorkers($workers);
            // echo "this is a about controller";
            $this->view('worker/services', $data);
        }
    }

    public function getAllWorkers($workers)
    {
        $result = $workers->findall('created');
        $data['data'] = $result;
        return $data;
    }
}
