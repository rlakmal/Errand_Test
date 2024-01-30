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

            $data["tick"] = $complaint->findAll();

// Assuming $data["tick"] is an array of objects with ->created(datetime)
            $currentDateTime = new DateTime();

// Calculate the date 30 days ago
            $thirtyDaysAgo = $currentDateTime->modify('-30 days')->format('Y-m-d H:i:s');

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


            $this->view('member/home2', $data);
        } else {
            redirect('home');
        }
    }
}
