<?php

class WorkerProfile extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $workerdet = new WorkerServices;
            $worker = new Worker;
            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;

            $foundworker = $workerdet->first($arr);
            $worker_id = $foundworker->worker_id;

            $data = $this->create($worker, $worker_id);
            $this->view('worker/workerprofile', $data);
        }
    }
    private function create($worker, $worker_id)
    {

        $array['id'] = $worker_id;
        $result = $worker->first($array);
        $newData['name'] = $result->name;
        $newData['city'] = $result->city;
        $newData['category'] = $result->category;
        $newData['address'] = $result->address;
        $newData['gender'] = $result->gender;
        $newData['dob'] = $result->dob;
        $newData['skills'] = $result->skills;
        $newData['expierience'] = $result->expierience;
        $newData['profile_image'] = $result->profile_image;
        $newData['certificate_image'] = $result->certificate_image;
        $data['newData'] = $newData;

        return $data;
    }
}
