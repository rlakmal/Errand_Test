<?php

class WorkerHome extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $worker = new WorkerServices();
            $jobs = new EmpPost;
            $id = $_SESSION['USER']->id;
            $data_suggest = $this->getsuggestWorker($id, $worker, $jobs);
            $data = $this->getAllJob($jobs);
            $viewData = [
                'data' => $data,
                'data_suggest' => $data_suggest
            ];
            //show($viewData);
            // echo "this is a about controller";
            $this->view('worker/home', $viewData);
        }
    }

    private function getAllJob($jobs)
    {
        $result = $jobs->findAll('job_created');
        return  $result;
    }
    private function getsuggestWorker($id, $worker, $jobs)
    {

        $arr['emp_id'] = $id;
        $result = $worker->where($arr, 'emp_id');
        $category = $result[0]->category;
        $array['category'] = $category;
        $job_result = $jobs->where($array);

        return $job_result;
    }
}
