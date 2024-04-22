<?php

class CompletedJobs extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $accepted_jobs = new AcceptedJobs;
            $emp_id = $_SESSION['USER']->id;
            $arr['worker_id'] = $emp_id;
            $arr['review_status'] = 'Completed';
            $results = $accepted_jobs->where($arr);
            $data['data'] = $results;
            //show($data);
            $this->view('worker/completedjobs', $data);
        } else {
            redirect('home');
        }
    }
}
