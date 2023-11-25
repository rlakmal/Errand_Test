<?php

class Workerprofview extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $worker = new Worker;
            $id = $_GET['id'];
            // show($id);
            $arr['id'] = $id;
            $result = $this->getData($arr, $worker);
            $data['data'] = $result;
            $this->view('employer/workerprof', $data);
        }
    }

    private function getData($arr, $worker)
    {
        $result = $worker->where($arr, 'created');
        return $result;
    }
}
