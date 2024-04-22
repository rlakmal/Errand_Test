<?php

class EmployersList extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {
            $employer = new User;
            $qdata["status"] = "employer";
            $data["data"] = $employer->where($qdata);

            $this->view('member/employers', $data);
        } else {
            redirect('home');
        }
    }
}
