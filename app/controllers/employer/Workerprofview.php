<?php

class Workerprofview extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $worker = new WorkerServices;
            $request = new EmployerReqWorker;
            $id = $_GET['id'];
            // show($id);
            $arr['emp_id'] = $id;
            $result = $this->getData($arr, $worker);
            $data['data'] = $result;
            if (isset($_POST['reqWorker'])) {
                unset($_POST['reqWorker']);
                $emp_id = $_SESSION['USER']->id;
                $wkr_id = $id;
                $_POST['emp_id'] = $emp_id;
                $_POST['worker_id'] = $wkr_id;
                $request->insert($_POST);
            }
            $this->view('employer/workerprof', $data);
        }
    }

    private function getData($arr, $worker)
    {
        $result = $worker->where($arr, 'created');
        return $result;
    }
}
