<?php

//namespace Member;

class Home extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'crew_member') {

            $this->view('admin/home2');
        } else {
            redirect('home');
        }
    }
}
