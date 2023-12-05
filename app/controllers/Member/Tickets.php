<?php

//namespace controllers\Member;

//use Ticket;
//use Controller;

class Tickets extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $ticket = new TicketUser;

        if ($username != 'User' && $_SESSION['USER']->status == 'crew_member') {

            $data["data"] = $ticket->findAll("ticket_id");
            $this->view('member/tickets',$data);
        } else {
            redirect('home');
        }
    }
}
