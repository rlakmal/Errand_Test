<?php

class WorkerHome extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $jobs = new EmpPost;
            $data = $this->getAllJob($jobs);
            // echo "this is a about controller";
            $this->view('worker/home', $data);
        }
    }

    private function getAllJob($jobs)
    {
        $result = $jobs->findAll('job_created');
        $data['data'] = $result;
        return  $data;
    }
}
