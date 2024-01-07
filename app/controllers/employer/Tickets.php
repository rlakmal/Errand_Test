<?php

//namespace controllers\employer;

//namespace controllers\employer;
//use Controller;

class Tickets extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $ticket = new Ticket();
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if ($_SESSION["USER"]->status == "employer") {
                // Fix the assignment operator here and initialize the array
                $q_data["user"] = $_SESSION["USER"]->id;
                $view_data["data"] = $ticket->where($q_data);
                $this->view("employer/tickets3", $view_data);
            }
        }
        else {
            if ($_SESSION["USER"]->status == "employer") {
                // Fix the assignment operator here and initialize the array
                $_POST["user"] = $_SESSION["USER"]->id;
                $ticket->insert($_POST);
                redirect("employer/tickets");
            }
        }
    }
}
