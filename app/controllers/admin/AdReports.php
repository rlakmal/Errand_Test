<?php

class AdReports extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {

        $user = new User();
        $worker = new Worker();
        $job = new JobPost();
        $crew = new CrewMember();
        $empreq = new EmployerReqWorker();
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $rep1 = new stdClass();
            $rep1->workers = count($worker->findAll());
            $qdata["verified"] = true;
            $workersveri = $worker->where($qdata);
            $rep1->workersveri = !$workersveri ? 0 : count($workersveri);
            $qdata["verified"] = false;
            $rep1->workersunveri = count($worker->where($qdata));
            $qdata["status"] = "employer";
            $rep1->employers = count($user->where($qdata));
            $rep1->crew = count($crew->findAll());

            $data["rep1"] = $rep1;

            $this->view('admin/reports', $data);
        } else {
            redirect('home');
        }
    }
}
