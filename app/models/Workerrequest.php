<?php

class Workerrequest
{
    use Model;
    protected $table = "request";

    public $errors1 = [];

    protected $allowed_columns = [

        "worker",
        "job",
        "offer",
        "time"

    ];

    public function validate1(){
        if(empty($data["time"])){
            $this->errors["time"] = "Date and Time Required";
        }
        if(empty($data["offer"])){
            $this->errors1["offer"] = "Offer Required";
        }

        if(empty($this->errors1)){
            return true;
        }
        else return false;
    }
}