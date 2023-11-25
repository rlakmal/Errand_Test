<?php

//namespace controllers\employer;

class EmpNotification extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $notification = new Notification();
        if ($_SESSION["USER"]->status == "employer") {
            // Fix the assignment operator here and initialize the array
            $q_data = ["employer" => true];
            $view_data["data"] = $notification->where($q_data);
            $this->view("employer/notifications", $view_data);
        }
    }
}
