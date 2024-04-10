<?php

class WorkRequests extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $request = new WorkeRrequestJobs();

        $data["requests"] = $request->findAll();

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $arr["id"] = $_GET["id"];
                $request->delete($arr["id"]);
                redirect("admin/workrequests");
            }

            $this->view('admin/workrequests', $data);

        }
    }
}