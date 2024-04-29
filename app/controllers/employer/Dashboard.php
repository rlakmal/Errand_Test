<?php

class Dashboard extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;
            $requets = new AcceptedJobs();
            $results = $requets->where($arr, 'budget');
            $results = count($results);
            $arr['review_status'] = 'Job Completed';
            $results1 = $requets->where($arr, 'id');
            $results1 = count($results1);
            unset($arr['review_status']);
            $arr['payment_stat'] = 'paid';
            $results2 = $requets->where($arr, 'id');
            $results2 = count($results2);
            $viewData = [
                'job_post' => $results,
                'job_completed' => $results1,
                'payment' => $results2
            ];
            $recent_req = new EmployerReqWorker();
            $recent_req = $recent_req->where(['emp_id' => $emp_id], 'created');

            $viewData['recent_req'] = $recent_req;
            //show($viewData);

            $notify = new JobNotify();
            $notify = $notify->where(['emp_id' => $emp_id], 'n_id');

            $viewData['notify'] = $notify;

            // echo "this is a about controller";
            $this->view('employer/dashboard', $viewData);
        }
    }
}
