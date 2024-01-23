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
        $empreq = new EmployerReqWorker();
        $wrkreq = new WorkeRrequestJobs();

        $qdata["status"] = "accepted";

        $data["empreq"] = $empreq->where($qdata);
        $data["wrkreq"] = $wrkreq->where($qdata);

//        $data["req"] = array_merge($data["empreq"], $data["wrkreq"]);

// Assuming $data["empreq"] and $data["wrkreq"] contain employer and worker requests respectively

// Combine employer and worker requests
        $allRequests = array_merge($data["empreq"]? $data["empreq"] : [], $data["wrkreq"]? $data["wrkreq"]: []);

// Filter requests created in the last 30 days
        $requestsLast30Days = array_filter($allRequests, function ($request) {
            $createdDate = new DateTime($request->created);
            $currentDate = new DateTime();

            $difference = $currentDate->diff($createdDate);
            $daysDifference = $difference->days;

            return $daysDifference <= 30;
        });

// Count the number of requests in the last 30 days
        $numberOfRequestsLast30Days = count($requestsLast30Days);

// Add the result to $data array
        $data["req30"] = $numberOfRequestsLast30Days;

// Now $data["req30"] contains the number of requests created in the last 30 days


        unset($qdata["status"]);

        $qdata["status"] = "employer";

        $data["employers"] = $user->where($qdata);
        $data["workers"] = $worker->findAll();
        $data["jobs"] = $job->findAll();
        $jobsLast30Days = array_filter($data["jobs"], function ($job) {
            $createdDate = new DateTime($job->created);
            $currentDate = new DateTime();

            $difference = $currentDate->diff($createdDate);
            $daysDifference = $difference->days;

            return $daysDifference <= 30;
        });

// Count the number of jobs in the last 30 days
        $numberOfJobsLast30Days = count($jobsLast30Days);

// Add the result to $data array
        $data["jobs30"] = $numberOfJobsLast30Days;
        $data["members"] = $member->findAll();

        if(!$data["members"]) $data["members"] = [];

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