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
        $empreqpay = new Emp_req_pay();


        $qdata["status"] = "accepted";

        $data["empreq"] = $empreq->where($qdata);
        $data["wrkreq"] = $wrkreq->where($qdata);

        $data["empreqpays"] = $empreqpay->findAll("req_id");


// Assuming $data["empreqpays"] contains the array of objects

// Define start and end dates for the past 7 days
        $endDate = date('Y-m-d');
        $startDate = date('Y-m-d', strtotime('-7 days', strtotime($endDate)));

// Initialize empreqpaysums array with zeros for each date
        $empreqpaysums = [];
        $sum = 0;
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $empreqpaysums[$currentDate] = 0;
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }

// Loop through the empreqpays array
        if($data["empreqpays"]){
            foreach ($data["empreqpays"] as $payment) {
                $paymentDate = date('Y-m-d', strtotime($payment->created));

                // Check if the payment date is within the past 7 days
                if ($paymentDate >= $startDate && $paymentDate <= $endDate) {
                    // Add the amount to the corresponding date's sum
                    $empreqpaysums[$paymentDate] += $payment->amount;
                    $sum += $payment->amount;
                }
            }
        }


// Now $empreqpaysums contains the sums of amounts for the past 7 days

        $data["empreqpaysums"] = $empreqpaysums;
        $data["sum"] = $sum;

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

        $joblocationcounts = [];

        foreach ($jobsLast30Days as $job) {
            $city = $job->city;
            if (!isset($joblocationcounts[$city])) {
                $joblocationcounts[$city] = 0;
            }
            $joblocationcounts[$city]++;
        }

        $data["joblocationcounts"] = $joblocationcounts;
        $data["members"] = $member->findAll();

        if(!$data["members"]) $data["members"] = [];

        $qdata["verified"] = true;
        unset($qdata["status"]);
        $data["verified"] = $worker->where($qdata);

        $data["verifiedpercentage"] = $data["verified"] ? ((count($data["verified"]) / count($data["workers"])) * 100) : 0;


        unset($qdata["verified"]);

        $data["users"] = array_merge($data["workers"], $data["employers"]);



        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $this->view('admin/home4', $data);

        }
    }
}