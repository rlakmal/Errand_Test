<?php

class ViewJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {
            $job = new EmpPost;
            $id = $_GET['id'];
            $arr['id'] = $id;
            $results = $job->where($arr);
            // show($results);
            $data['data'] = $results;

            $this->view('admin/viewjob', $data);
        }
    }
}
