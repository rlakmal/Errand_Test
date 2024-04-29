<?php

class Bargains extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $request = new Bargainbgt();
        $emp_request = new EmployerReqWorker();

        $data["requests"] = $request->findAll();

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            if (isset($_POST["delete"])) {
                $arr["id"] = $_GET["id"];
                $request->delete($arr["id"]);
                redirect("admin/bargains");
            }

            if(isset($_POST["update"])){

                $id = $_POST["id"];
                unset($_POST["id"]);
                unset($_POST["update"]);
                $request->update($id, $_POST);
                redirect("admin/bargains");

            }

            $this->view('admin/bargains', $data);

        }
    }
}