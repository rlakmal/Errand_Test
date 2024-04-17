<?php

class Myjobs extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $worker_req_jobs = new WorkeRrequestJobs;
            $id = $_SESSION['USER']->id;
            $arr['worker_id'] = $id;
            $result = $worker_req_jobs->where($arr);
            $data['data'] = $result;
            //show($data);
            $this->view('worker/myjobs', $data);
        }
    }
}
