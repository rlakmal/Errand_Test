<?php

class WorkeRrequestJobs
{
    use Model;
    protected $table = "worker_req_jobs";

    // public $errors1 = [];

    protected $allowed_columns = [
        'emp_id',
        'worker_id',
        'title',
        'newbudget',
        'budget',
        'city',
        'description',
        'emp_name',
        'worker_name',
        'status'

    ];

    // public function validate1(){
    //     if(empty($data["time"])){
    //         $this->errors["time"] = "Date and Time Required";
    //     }
    //     if(empty($data["offer"])){
    //         $this->errors1["offer"] = "Offer Required";
    //     }

    //     if(empty($this->errors1)){
    //         return true;
    //     }
    //     else return false;
    // }
}
