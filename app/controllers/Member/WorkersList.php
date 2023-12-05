<?php


class WorkersList extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $worker = new Worker;
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'crew_member') {

            $data["data"] = $worker->findAll();

            $this->view('member/workers', $data);
        } else {
            redirect('home');
        }
    }
}
