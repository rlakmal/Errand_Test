<?php

class PostedjobsRequest extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $worker_req_jobs = new WorkeRrequestJobs;
            $accepted_jobs = new AcceptedJobs;

            if (isset($_POST['Accept'])) {
                //show($_POST);
                $id = $_POST['id'];
                $arr['id'] = $id;
                $updateData = ['status' => 'Accepted'];
                $worker_req_jobs->update($id, $updateData, 'id');
                $this->sendNotification($_POST['worker_id'], $_POST['title'], 'Accepted');
                $budegt = $_POST['newbudget'];
                unset($_POST['newbudget']);
                unset($_POST['id']);
                unset($_POST['Accept']);
                $_POST['budget'] = $budegt;

                //                $_POST['payment_stat'] = "unpaid";
                //                $_POST['type'] = "worker";
                //show($_POST);


                $_POST['emp_name'] = $_SESSION['USER']->name;
                $_POST['payment_stat'] = "Pay Now";
                $_POST['type'] = "worker";
                //show($_POST);
                $accepted_jobs->insert($_POST);
                redirect('employer/postedjobsrequest');
            }

            if (isset($_POST['Reject'])) {
                $id = $_POST['id'];
                $updateData = ['status' => 'Rejected'];
                $worker_req_jobs->update($id, $updateData, 'id');;
                $this->sendNotification($_POST['worker_id'], $_POST['title'], 'Rejected');
                redirect('employer/postedjobsrequest');
            }

            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;
            $results = $worker_req_jobs->where($arr);
            foreach ($results as $item) {
                $expire = strtotime($item->expire_date);
                $remain = $expire - time();
                if ($remain <= 60 && $item->status == 'Pending') {
                    $id = $item->id;
                    $updateData = ['status' => 'Expired'];
                    $worker_req_jobs->update($id, $updateData, 'id');
                    redirect('employer/postedjobsrequest');
                }
            }
            //show($results);
            $data['data'] = $results;
            $this->view('employer/postedjobsrequest', $data);
        }
    }

    public function sendNotification($worker_id, $title, $status)
    {
        $notification = new JobNotify;
        $emp_name = $_SESSION['USER']->name;
        $arr['emp_id'] = $worker_id;
        $arr['message'] = "Your job Request for " . $title . " has been " . $status . " by " . $emp_name;
        $arr['notification_name'] = $emp_name;
        $arr['active'] = 1;
        //show($arr);
        $notification->insert($arr);
    }

    public function fetchTime($a = '', $b = '', $c = '')
    {
        $id = $_GET['id'];
        $time = time();

        echo json_encode($id);
    }
}
