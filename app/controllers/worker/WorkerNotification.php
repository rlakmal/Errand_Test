<?php

//namespace controllers\employer;

class WorkerNotification extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $notification = new Notification();
        if ($_SESSION["USER"]->status == "worker") {
            // Fix the assignment operator here and initialize the array
            $q_data = ["worker" => true];
            $view_data["data"] = $notification->where($q_data);
            $this->view("worker/notifications", $view_data);
        }
    }
}
