<?php

class Jobs extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $jobs = new EmpPost;
            $jobs2 = new JobPost;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $arr["id"] = $_GET["id"];
                $jobs2->delete($arr);
                redirect("admin/jobs");
            }
            $data = $this->getAllJob($jobs);
            // echo "this is a about controller";
            $this->view('admin/jobs', $data);


        }
    }

    private function getAllJob($jobs)
    {
        $result = $jobs->findAll('job_created');
        $data['data'] = $result;
        return  $data;

    }
}
