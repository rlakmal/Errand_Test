<?php

class AdHome extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $user = new User();
        $worker = new Worker();
        $job = new JobPost();
        $member = new CrewMember();

        $qdata["status"] = "employer";

        $data["employers"] = $user->where($qdata);
        $data["workers"] = $worker->findAll();
        $data["jobs"] = $job->findAll();
        $data["members"] = $member->findAll();

        $qdata["verified"] = true;
        unset($qdata["status"]);
        $data["verified"] = $worker->where($qdata);

        $data["verifiedpercentage"] = (count($data["verified"])/count($data["workers"])) *100;


        unset($qdata["verified"]);

        $data["users"] = array_merge($data["workers"], $data["employers"]);

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $this->view('admin/home4', $data);

        }
    }
}