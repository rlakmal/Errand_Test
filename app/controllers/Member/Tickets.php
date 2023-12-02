<?php

//namespace controllers\Member;

//use Ticket;
//use Controller;

class Tickets extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $ticket = new Ticket;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            $data["data"] = $ticket->findAll();
            $this->view('member/tickets',$data);
        } else {
            redirect('home');
        }
    }
}
