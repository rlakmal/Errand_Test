
<?php

class ViewWorkers extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $reviews = new Ratings;
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

            $findreviews = $reviews->where($arr, 'id');
            $viewData = [
                'results' => $findreviews,
                'data' => $data
            ];
            //show($viewData);


            $this->view('worker/viewworker', $viewData);
        }
    }
    private function create($worker_details, $worker_id)
    {
        $arr['id'] = $worker_id;
        $result = $worker_details->where($arr, 'created');
        return $result;
    }
}
