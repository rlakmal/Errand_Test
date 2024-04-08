<?php

class ReviewRequest extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $accepted_jobs = new AcceptedJobs;
            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;
            $arr['payment_stat'] = "paid";
            $results = $accepted_jobs->where($arr);
            $data['data'] = $results;
            //show($data);
            $this->view('employer/reviewrequest', $data);
        }
    }
    public function markAsCompleted($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $id = $_GET['id'];
            $accepted_jobs = new AcceptedJobs;
            $updateData = [
                'review_status' => 'Completed',
            ];
            $accepted_jobs->update($id, $updateData, 'id');
            echo "Job completed Successfully";
        }
    }

    public function handleRating($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {

            
        }
    }
}
