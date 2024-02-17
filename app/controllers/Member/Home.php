<?php

//namespace Member;

class Home extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            $user = new User();
            $worker = new Worker();
            $complaint = new Ticket();
            $complaint_arch = new Archive_Time();

            $qdata["status"] = "employer";
            $emp = $user->where($qdata);

            $data["emp"] = $emp? count($emp) : 0;
            unset($qdata["status"]);

            $qdata["verified"] = true;
            $very = $worker->where($qdata);

            $data["veri"] = $very? count($very) : 0;

            $qdata["verified"] = false;
            $unvery = $worker->where($qdata);

            $data["unveri"] = $unvery? count($unvery) : 0;

            $data["workerco"] = $data["veri"] + $data["unveri"];

            $data["tick"] = $complaint->findAll();

// Assuming $data["tick"] is an array of objects with ->created(datetime)
            $currentDateTime = new DateTime();

// Calculate the date 30 days ago
            $thirtyDaysAgo = $currentDateTime->modify('-14 days')->format('Y-m-d H:i:s');

// Filter items in $data["tick"] that were created in the last 30 days
            $data["tick30"] = array_filter($data["tick"], function ($item) use ($thirtyDaysAgo) {
                $itemDateTime = new DateTime($item->created);
                return $itemDateTime > $thirtyDaysAgo;
            });

// Get the count of items in the last 30 days
            $data["tick30Count"] = count($data["tick30"]);

// If $data["tick30"] is empty, set the count to 0
            if (empty($data["tick30"])) {
                $data["tick30Count"] = 0;
            }

            $data["tick"] = $complaint->findAll();

            // Initialize an associative array to store counts for each month
            $data["tickmonths"] = array();

// Get the current month
            $currentMonth = date('Y-m');

// Initialize counts for the last 7 months (including the current month)
            for ($i = 0; $i < 7; $i++) {
                $month = date('Y-m', strtotime("-$i months"));
                $data["tickmonths"][$month] = 0;
            }

// Iterate through the tickets and count them for each month
            foreach ($data["tick"] as $ticket) {
                // Extract the month from the created datetime
                $ticketMonth = date('Y-m', strtotime($ticket->created));

                // Increment the count for the corresponding month
                if (isset($data["tickmonths"][$ticketMonth])) {
                    $data["tickmonths"][$ticketMonth]++;
                }
            }

// If there are no tickets for a particular month, the count will be 0
// Now $data["tickmonths"] contains counts for each month

            $data["tickarch"] = $complaint_arch->findAll();

            // Initialize an associative array to store counts for each month
            $data["tickarchmonths"] = array();

// Get the current month

// Initialize counts for the last 7 months (including the current month)
            for ($i = 0; $i < 7; $i++) {
                $month = date('Y-m', strtotime("-$i months"));
                $data["tickarchmonths"][$month] = 0;
            }

// Iterate through the tickets and count them for each month
            foreach ($data["tickarch"] as $ticket) {
                // Extract the month from the created datetime
                $ticketMonth = date('Y-m', strtotime($ticket->arch_time));

                // Increment the count for the corresponding month
                if (isset($data["tickarchmonths"][$ticketMonth])) {
                    $data["tickarchmonths"][$ticketMonth]++;
                }
            }

// If there are no tickets for a particular month, the count will be 0
// Now $data["tickmonths"] contains counts for each month


            $this->view('member/dashboard2', $data);
        } else {
            redirect('home');
        }
    }
}
