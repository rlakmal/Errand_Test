<?php

//namespace controllers\Member;

use Controller;
use models\TicketNote;
use models\Note;

class Ticket extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $ticketnote = new TicketNote;
        $note = new Note;
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $qdata["id"] = $_GET["id"];

                $data["data"] = $ticketnote->where($qdata);

                $this->view('member/ticket', $data);
            }

            else {
                $data["ticket"] = $_GET["id"];
                $data["body"] = $_POST["body"];
                $note->insert($data);
                redirect("member/ticket?id=".$_GET["id"]);
            }

        } else {
            redirect('home');
        }
    }
}
