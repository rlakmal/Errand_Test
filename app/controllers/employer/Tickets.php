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
        } elseif (isset($_POST["Updater"])){

            $data["title"] = $_POST["title"];
            $data["description"] = $_POST["description"];

            if($data["title"] == '' && $data["description"] = ''){
                redirect("employer/tickets");

            }
            if($data["title"] == ''){
                unset($data["title"]);
            }
            if($data["description"] == ''){
                unset($data["description"]);
            }
            var_dump($_POST);
            $ticket->update($_POST["id"], $data);
            redirect("employer/tickets");

        } else {
            if ($_SESSION["USER"]->status == "employer") {
                // Fix the assignment operator here and initialize the array
                $_POST["user"] = $_SESSION["USER"]->id;
                $ticket->insert($_POST);
                redirect("employer/tickets");
            }
        }
    }
}
