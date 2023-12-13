<?php

//namespace controllers\Member;

use Controller;

class Verification extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $worker = new Worker;
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'crew_member') {

            $qdata["id"] = $_GET["id"];
            $data["worker"] = $worker->first($qdata);
            $this->view('member/workerverification', $data);
        } else {
            redirect('home');
        }
    }
}
