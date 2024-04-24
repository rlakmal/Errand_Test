<?php

class OngoingJobs extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $accepted_jobs = new AcceptedJobs;
            $emp_id = $_SESSION['USER']->id;
            $arr['worker_id'] = $emp_id;
            $arr['review_status'] = 'Mark As Completed';
            $arr['payment_stat'] = 'paid';
            $results = $accepted_jobs->where($arr);
            $data['data'] = $results;
            $this->view('worker/ongoingjobs', $data);
        } else {
            redirect('home');
        }
    }
}
