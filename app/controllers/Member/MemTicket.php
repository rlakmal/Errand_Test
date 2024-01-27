<?php

//namespace controllers\Member;



class MemTicket extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $ticketnote = new TicketNote;
        $note = new Note;
        $ticket = new Ticket;
        $user = new User;
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $qdata["id"] = $_GET["id"];

                $data["ticket"] = $ticket->first($qdata);
                unset($qdata["id"]);
                $qdata["id"] = $data["ticket"]->user;
                $data["user"] = $user->first($qdata);

                $qdata["ticket_id"] = $_GET["id"];

                unset($qdata["id"]);
                $data["notes"] = $ticketnote->where($qdata, "note_id");

                $this->view('member/ticket', $data);
            }

            else {
                if(isset($_POST["archive"])){
                    $update_q["archived"] = true;
                    $ticket->update($_GET["id"], $update_q);
                    redirect("member/ticket?id=".$_GET["id"]);

                }
                if(isset($_POST["unarchive"])){
                    $update_q["archived"] = false;
                    $ticket->update($_GET["id"], $update_q);
                    redirect("member/ticket?id=".$_GET["id"]);

                }
                $data["ticket_id"] = $_GET["id"];
                $data["body"] = $_POST["body"];
                $note->insert($data);
                redirect("member/ticket?id=".$_GET["id"]);
            }

        } else {
            redirect('home');
        }
    }
}
