<?php


class WorkersList extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $worker = new WorkerEmployer();
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            $data["data"] = $worker->findAll("emp_id");

            $this->view('member/workers', $data);
        } else {
            redirect('home');
        }
    }
}
