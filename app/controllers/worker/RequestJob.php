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
            $results = $job->where($arr);
            // show($results);
            $data['data'] = $results;
            $worker_name = $_SESSION['USER']->name;
            $worker_id = $_SESSION['USER']->id;
            if (isset($_POST['Rquest'])) {
                // show($_POST);
                $this->requestInsert($results, $_POST, $newreq, $worker_name, $worker_id);
            }
            $this->view('worker/requestjob', $data);
        }
    }
    private function requestInsert($results, $data, $newreq, $worker_name, $worker_id)
    {
        //show($results[0]->title);
        $newdata['job_id'] = $results[0]->id;
        $newdata['emp_id'] = $results[0]->emp_id;
        $newdata['title'] = $results[0]->title;
        $newdata['city'] = $results[0]->city;
        $newdata['budget'] = $results[0]->budget;
        $newdata['description'] = $results[0]->description;
        if ($data['newbudget'] == null) {
            $newdata['newbudget'] = $results[0]->budget;
        } else {
            $newdata['newbudget'] = $data['newbudget'];
        }

        $newdata['worker_name'] = $worker_name;
        $newdata['worker_id'] = $worker_id;
        $newdata['emp_name'] = $results[0]->name;
        $newdata['status'] = "Pending";
        //show($newdata);

        $newreq->insert($newdata);
        redirect('worker/requestjob?id=' . $data['id']);
    }
}
