<?php

namespace controllers\Member;

use Controller;

class Verification extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            $this->view('member/verification');
        } else {
            redirect('home');
        }
    }
}
