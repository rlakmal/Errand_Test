<?php

class WorkersList2 extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $worker = new Worker;
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $data["data"] = $worker->findAll();

            $this->view('admin/workers2', $data);
        } else {
            redirect('home');
        }
    }
}
