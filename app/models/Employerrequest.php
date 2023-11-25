<?php

namespace models;

class Employerrequest
{
    use \Model;
    protected $table = "request";

    public $errors1 = [];

    protected $allowed_columns = [

        "to_worker",
        "employer",
        "job",
        "offer",
        "time"

    ];

    public function validate1(){
        if(empty($data["time"])){
            $this->errors["time"] = "Date and Time Required";
        }
        if(empty($data["offer"])){
            $this->errors["offer"] = "Offer Required";
        }

        if(empty($data["to_worker"])){
            $this->errors1["to_worker"] = "Worker cannot be empty";
        }

        if(empty($this->errors)){
            return true;
        }
        else return false;
    }
}