<?php

class Services extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $worker = new Worker;
            $data = $this->getWorkerdata($worker);

            $this->view('employer/services', $data);
        }
    }

    private function getWorkerData($worker)
    {
        $result = $worker->findAll('created');
        $data['data'] = $result;
        return $data;
    }
}
