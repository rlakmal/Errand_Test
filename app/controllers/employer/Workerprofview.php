<?php

class Workerprofview extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $worker = new WorkerServices;
            $worker_details = new Worker;
            $request = new EmployerReqWorker;
            $id = $_GET['id'];
            // show($id);
            $arr['emp_id'] = $id;
            $foundworker = $worker->first($arr);
            $worker_id = $foundworker->worker_id;
            $worker_name = $foundworker->name;
            $data = $this->create($worker_details, $worker_id);
            //show($data);

            // if (!empty($data['data'])) {
            //     $worker_name = $data['data'][0]->name;
            // }
            if (isset($_POST['reqWorker'])) {
                unset($_POST['reqWorker']);
                $emp_id = $_SESSION['USER']->id;
                $emp_name = $_SESSION['USER']->name;
                $wkr_id = $id;
                $_POST['emp_id'] = $emp_id;
                $_POST['emp_name'] = $emp_name;
                $_POST['worker_id'] = $wkr_id;
                $_POST['worker_name'] = $worker_name;
                $_POST['status'] = "Pending";
                $_POST['time_remain'] = time();
                $request->insert($_POST);
            }
            $this->view('employer/workerprof', $data);
        }
    }

    private function create($worker_details, $worker_id)
    {
        $arr['id'] = $worker_id;
        $result = $worker_details->where($arr, 'created');
        return $result;
    }
}
