<?php

class Services extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $w_services = new WorkerServices;
            $data = $this->getWorkerdata($w_services);

            $this->view('employer/services', $data);
        }
    }

    private function getWorkerData($w_services)
    {
        $result = $w_services->findAll('created');
        $data['data'] = $result;
        return $data;
    }
}
