<?php
//use EmpPost;
use LDAP\Result;

class WorkerHome extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $job = new EmpPost;
//        $data["data"] = $job->findAll();
        $post = new EmpPost;
        $data = $this->getAllJob($post);

        // echo "this is a about controller";

        $this->view('worker/home', $data);
    }

    private function getAllJob($jobPost)
    {
        $result = $jobPost->findAll('job_created');
        $data['data'] = $result;
        return  $data;
    }

}