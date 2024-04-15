<?php

class EmpRequests extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $request = new EmployerReqWorker();

        $data["requests"] = $request->findAll();

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if(isset($_POST["delete"])){
                    $arr["id"] = $_GET["id"];
                    $request->delete($arr["id"]);
                    redirect("admin/emprequests");
                }

                if(isset($_POST["update"])){

                    $id = $_POST["id"];
                    unset($_POST["id"]);
                    unset($_POST["update"]);
                    $request->update($id, $_POST);
                    redirect("admin/emprequests");

                }

            }

            $this->view('admin/emprequests', $data);

        }
    }
}