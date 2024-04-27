<?php

class RequestJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $job = new EmpPost;
            $newreq = new WorkeRrequestJobs;
            $id = $_GET['id'];
            $arr['id'] = $id;
            $results = $job->where($arr, 'id');
            // show($results);

            $data['data'] = $results;;

            // $worker_name = $_SESSION['USER']->name;
            // $worker_id = $_SESSION['USER']->id;
            // if (isset($_POST['Rquest'])) {
            //     // show($_POST);
            //     $this->requestInsert($results, $_POST, $newreq, $worker_name, $worker_id);
            // }
            $this->view('worker/requestjob', $data);
        }
    }
    // private function requestInsert($results, $data, $newreq, $worker_name, $worker_id)
    // {
    //     //show($results[0]->title);
    //     $newdata['job_id'] = $results[0]->id;
    //     $newdata['emp_id'] = $results[0]->emp_id;
    //     $newdata['title'] = $results[0]->title;
    //     $newdata['city'] = $results[0]->city;
    //     $newdata['budget'] = $results[0]->budget;
    //     $newdata['description'] = $results[0]->description;
    //     if ($data['newbudget'] == null) {
    //         $newdata['newbudget'] = $results[0]->budget;
    //     } else {
    //         $newdata['newbudget'] = $data['newbudget'];
    //     }

    //     $newdata['worker_name'] = $worker_name;
    //     $newdata['worker_id'] = $worker_id;
    //     $newdata['emp_name'] = $results[0]->name;
    //     $newdata['status'] = "Pending";
    //     //show($newdata);

    //     $newreq->insert($newdata);
    //     redirect('worker/requestjob?id=' . $data['id']);
    // }
    public function insertRequest($a = '', $b = '', $c = '')
    {

        $location = new JobPost();
        $job = new EmpPost;
        $newreq = new WorkeRrequestJobs;
        $newNotify = new JobNotify;
        if (isset($_POST['Rquest'])) {
            try {
                $id = $_POST['id'];
                $arr['id'] = $id;
                $results = $job->where($arr);
                if (empty($results)) {
                    throw new Exception("Job not found");
                }

                $data_location = $location->where($arr);
                $datal = $data_location[0]->location;

                $worker_name = $_SESSION['USER']->name;
                $worker_id = $_SESSION['USER']->id;

                $newdata['job_id'] = $results[0]->id;
                $newdata['emp_id'] = $results[0]->emp_id;
                $newdata['title'] = $results[0]->title;
                $newdata['city'] = $results[0]->city;
                $newdata['budget'] = $results[0]->budget;
                $newdata['description'] = $results[0]->description;

                if ($_POST['newbudget'] == null) {
                    $newdata['newbudget'] = $results[0]->budget;
                } else {
                    $newdata['newbudget'] = $_POST['newbudget'];
                }

                $newdata['worker_name'] = $worker_name;
                $newdata['worker_id'] = $worker_id;
                $newdata['emp_name'] = $results[0]->name;
                $newdata['status'] = "Pending";
                $newdata['location'] = $datal;
                $newdata['expire_date'] = date('Y-m-d', strtotime("+1 week"));
                $message = "Job have new Job request from {$worker_name}";
                $array['message'] = $message;
                $array['emp_id'] = $results[0]->emp_id;
                $array['notification_name'] = $worker_name;
                $array['active'] = 1;
                $newNotify->insert($array);
                $newreq->insert($newdata);

                $output = "Job Requested Successfully To {$newdata['emp_name']}";
                echo json_encode($output);
            } catch (Exception $e) {
                http_response_code(500); // Set HTTP response code to indicate server error
                echo json_encode(["error" => $e->getMessage()]);
            }
        }
    }
}
