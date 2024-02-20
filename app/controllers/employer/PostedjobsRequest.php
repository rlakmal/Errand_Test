<?php

class PostedjobsRequest extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {

            $worker_req_jobs = new WorkeRrequestJobs;

            $results = $worker_req_jobs->findAll('created');
            $data['data'] = $results;

            $this->view('employer/postedjobsrequest', $data);
        }
    }
}
