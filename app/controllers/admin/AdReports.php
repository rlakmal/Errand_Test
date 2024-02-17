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
        $workreq = new WorkeRrequestJobs();
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $ticket = new TicketUser();
        $empreqpay = new Emp_req_pay();

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $rep1 = new stdClass();
            $rep1->workers = count($worker->findAll());
            $qdata["verified"] = true;
            $workersveri = $worker->where($qdata);
            $rep1->workersveri = !$workersveri ? 0 : count($workersveri);
            $qdata["verified"] = false;
            $rep1->workersunveri = count($worker->where($qdata));
            unset($qdata["verified"]);
            $qdata["status"] = "employer";
            $rep1->employers = count($user->where($qdata));
            $rep1->crew = count($crew->findAll());

            $rep1->workerslist = $worker->findAll();

            $workCategoryCounts = array();

// Count occurrences of cities for employers
            foreach ($rep1->workerslist as $worker) {
                $category = strtolower($worker->category);
                if (!isset($workCategoryCounts[$category])) {
                    $workCategoryCounts[$category] = 0;
                }
                $workCategoryCounts[$category]++;
            }

            $rep1->category = $workCategoryCounts;


            $data["rep1"] = $rep1;

            $qdata["status"] = "Expired";

            $rep2 = new stdClass();
            $rep2->emplexp = count($empreq->where($qdata));

            $qdata["status"] = "Canceled";
            $rep2->empcanc = count($empreq->where($qdata));
            $qdata["status"] = "Accepted";
            $rep2->empacc = count($empreq->where($qdata));
            $qdata["status"] = "Rejected";
            $rep2->emprej = count($empreq->where($qdata));
            $qdata["status"] = "Requested";
            $rep2->empreqs = count($empreq->where($qdata));


            $qdata["status"] = "pending";
            $rep2->workpend = count($workreq->where($qdata));

            $data["rep2"] = $rep2;


            //finances

            $rep4 = new stdClass();

            $rep4->empreqpays = $empreqpay->findAll("req_id");

            $rep4->last30empreqpays = [];

            $currentTimestamp = time();

// Timestamp 30 days ago
            $thirtyDaysAgoTimestamp = strtotime('-30 days');

            if ($rep4->empreqpays) {
                foreach ($rep4->empreqpays as $pay) {
                    // Convert 'created' date string to Unix timestamp
                    $createdTimestamp = intval(strtotime($pay->created));


                    // Check if the 'created' date falls within the last 30 days
                    if ($createdTimestamp >= $thirtyDaysAgoTimestamp && $createdTimestamp <= $currentTimestamp) {
                        // Add the ticket to the last 30 days work array
                        array_push($rep4->last30empreqpays, $pay);
                    }
                }
            }

            $rep4->empreqcount = count($rep4->last30empreqpays);



            //Job, User demographics
            $data["rep4"] = $rep4;

            $rep3 = new stdClass();


            unset($qdata);

            $qdata["status"] = "employer";

            $rep3->employer = $user->where($qdata);
            $qdata["status"] = "worker";

            $rep3->worker = $user->where($qdata);

            $empLocationCounts = array();
            $workLocationCounts = array();

// Count occurrences of cities for employers
            foreach ($rep3->employer as $employer) {
                $city = strtolower($employer->city);
                if (!isset($empLocationCounts[$city])) {
                    $empLocationCounts[$city] = 0;
                }
                $empLocationCounts[$city]++;
            }

// Count occurrences of cities for workers
            foreach ($rep3->worker as $worker) {
                $city = strtolower($worker->city);
                if (!isset($workLocationCounts[$city])) {
                    $workLocationCounts[$city] = 0;
                }
                $workLocationCounts[$city]++;
            }

// Assign the counts to rep3->emplocation and rep3->worklocation respectively
            $rep3->emplocation = $empLocationCounts;
            $rep3->worklocation = $workLocationCounts;

            $data["rep3"] = $rep3;

            //ticket

            $rep5 = new stdClass();

            unset($qdata["status"]);


            $qdata["status"] = "worker";
            $rep5->worktickets = $ticket->where($qdata, "ticket_id");

            $qdata["status"] = "employer";
            $rep5->emptickets = $ticket->where($qdata, "ticket_id");

            $currentTimestamp = time();

// Timestamp 30 days ago
            $thirtyDaysAgoTimestamp = strtotime('-30 days');

// Initialize arrays for last 30 days items
            $rep5->last30emp = [];
            $rep5->last30work = [];

// Loop through worktickets array
            if ($rep5->worktickets) {
                foreach ($rep5->worktickets as $ticket) {
                    // Convert 'created' date string to Unix timestamp
                    $createdTimestamp = intval(strtotime($ticket->created));


                    // Check if the 'created' date falls within the last 30 days
                    if ($createdTimestamp >= $thirtyDaysAgoTimestamp && $createdTimestamp <= $currentTimestamp) {
                        // Add the ticket to the last 30 days work array
                        array_push($rep5->last30work, $ticket);
                    }
                }
            }

// Loop through emptickets array
            if ($rep5->emptickets) {
                foreach ($rep5->emptickets as $ticket) {
                    // Convert 'created' date string to Unix timestamp
                    $createdTimestamp = strtotime($ticket->created);

                    // Check if the 'created' date falls within the last 30 days
                    if ($createdTimestamp >= $thirtyDaysAgoTimestamp && $createdTimestamp <= $currentTimestamp) {
                        // Add the ticket to the last 30 days emp array
                        $rep5->last30emp[] = $ticket;
                    }
                }
            }

            $rep5->emparchived = 0;
            $rep5->empnonarchived = 0;
            $rep5->workarchived = 0;
            $rep5->worknonarchived = 0;

// Count archived and non-archived items in last30emp array
            foreach ($rep5->last30emp as $ticket) {
                if ($ticket->archived) {
                    $rep5->emparchived++;
                } else {
                    $rep5->empnonarchived++;
                }
            }

// Count archived and non-archived items in last30work array
            foreach ($rep5->last30work as $ticket) {
                if ($ticket->archived) {
                    $rep5->workarchived++;
                } else {
                    $rep5->worknonarchived++;
                }
            }
            // Further code...

            $data["rep5"] = $rep5;

            $this->view('admin/reports', $data);


        } else {
            redirect('home');
        }
    }
}
