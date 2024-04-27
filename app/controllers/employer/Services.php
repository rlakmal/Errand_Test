<?php

class Services extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $w_services = new WorkerServices;
            $result = $w_services->findAll('avg_rating');
            $data['data'] = $result;
            foreach ($data['data'] as $item) {
                $this->getWorkerRatings($item->emp_id, $item->worker_id);
            }

            $this->view('employer/services', $data);
        }
    }

    private function getWorkerRatings($emp_id, $worker_id)
    {
        $ratings = new Ratings();
        $worker = new Worker();
        $arr['emp_id'] = $emp_id;
        $total_ratings = 0;
        $avg = 0;
        $result = $ratings->where($arr, 'id');
        if ($result) {
            $count = count($result);
            $data['data'] = $result;

            foreach ($data['data'] as $item) {
                $total_ratings = $total_ratings + $item->rating_data;
            }
            $avg = $total_ratings / $count;
            $array['avg_rating'] = $avg;
            $worker->update($worker_id, $array, 'id');
        } else {
            //show(0);
        }
    }
}
