<?php

//namespace controllers\employer;

class EmpNotification extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $notification = new Notification();
        $job_notify = new JobNotify();
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $q_data = ["employer" => true];
            $results = $notification->where($q_data);
            $arr['emp_id'] = $_SESSION['USER']->id;
            $data = $job_notify->where($arr, 'n_id');

            // Combine $results and $data into a single array
            $viewData = [
                'results' => $results,
                'data' => $data
            ];

            $this->view("employer/notifications", $viewData);
        }
    }


    public function wJobNotify($a = '', $b = '', $c = '')
    {
        $job_notification = new JobNotify();
        $emp_id = $_SESSION['USER']->id;
        $arr['emp_id'] = $emp_id;
        $arr['active'] = 1;
        $results = $job_notification->where($arr, 'n_id');
        if ($results != NULL) {
            $notify_count['count'] = count($results);
        } else {
            $notify_count['count'] = 0;
        }

        $data = json_encode($notify_count);
        echo $data;
    }
    public function wJobNotifyUpdate($a = '', $b = '', $c = '')
    {
        $job_notification = new JobNotify();
        $n_id = $_POST['n_id'];
        $arr['n_id'] = $n_id;
        $updateData = ['active' => 0];
        $job_notification->update($n_id, $updateData, 'n_id');

        $data = "success";
        echo $data;
    }
}
