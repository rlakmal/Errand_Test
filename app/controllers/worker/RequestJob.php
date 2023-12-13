<?php

class RequestJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $job = new EmpPost;
            $id = $_GET['id'];
            $arr['id'] = $id;
            $results = $job->where($arr);
            $data['data'] = $results;


            $this->view('worker/requestjob', $data);
        }
        // echo "this is a about controller";

    }
}
