<?php

class AccRequests extends Controller
{
    public function index($a = '', $b = '', $c = ''){

        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $accepted = new AcceptedJobs();

        $data["requests"] = $accepted->findAll();

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if(isset($_POST["delete"])){
                    $arr["id"] = $_GET["id"];
                    $accepted->delete($arr["id"]);
                    redirect("admin/accrequests");
                }

                if(isset($_POST["update"])){
                    $id = $_GET["id"];
                    $accepted->update($id, $_POST);
                    redirect("admin/accrequests");

                }

            }

            $this->view('admin/accrequests', $data);

        }
    }
}