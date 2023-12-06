<?php

class RequestJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $id = $_GET['id'];
            show($id);


            $this->view('worker/requestjob');
        }
        // echo "this is a about controller";

    }
}
