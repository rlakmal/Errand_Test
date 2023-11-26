<?php

//namespace controllers\employer;

//use controllers\Job;
use models\Employerrequest;
use models\JobPage;
use models\User;
use models\Workerrequest;

class Request extends \Controller
{

    protected $request_errors = [];


    public function create_emp(){
//        if ($_SESSION["REQUEST_METHOD"] == "POST"){
            $empl_request = new Employerrequest();
            $array["job"] = $_POST["job"];
            $array["employer"] = $_SESSION["USER"] -> id;
            $array["worker"] = $_POST["worker"];
            $row = $empl_request->first($array);

//            if($row){
//                $this->request_errors["already_exists"] = "Request Already Exists";
//                $data["errors"] = $this->request_errors;
//                $this->view("createemprequest", $data);

//            }
//        else {
                $_POST = array_merge($_POST, $array);
                if($empl_request->validate1($_POST)){
                    $empl_request->insert($_POST);
                    redirect("employer/home");
                }
//            }
//        } else {
//            $this->view("createemprequest");
//
//        }
    }
    public function edit_emp(){
        $empl_request = new Employerrequest();
//        if ($_SESSION["REQUEST_METHOD"] == "POST"){
            $data["id"] = $_POST["request"];
            $row1 = $empl_request->first($data);

            if(!$row1 || $_SESSION["USER"]->status != "employer" || $row1->employer != $_SESSION["USER"]->id){
                redirect("404");

            } else {
                $array["offer"] = $_POST["offer"];
                $array["time"] = $_POST["time"];
//                $array[""]
                $empl_request->update($data["id"], $array);
                redirect("employer/home");

            }
//        } else {
//            $data["id"] = $_GET["url0"];
//            $row1 = $empl_request->first($data);
//
//            if(!$row1 || $_SESSION["USERTYPE"] != "employer" || $row1->employer != $_SESSION["USER"]->id){
//                redirect("404");
//
//            } else {
//                $view_data["row"] = $row1;
//                $this->view("editemprequest", $view_data);
//            }
//        }
    }



    public function counter_work(){
        $work_request = new Workerrequest();
        $empl_request = new Employerrequest();
        $job  = new JobPost();

//        if ($_SESSION["REQUEST_METHOD"] == "POST"){
            $data["id"] = $_GET["request"];
            $row1 = $work_request->first($data);
            $data["id"] = $row1->job;
            $row2 = $job->first($data);
//            if(!$row1 || $_SESSION["USERTYPE"] != "employer" || $row2->employer != $_SESSION["USER"]->id){
//                redirect("404");
//            }
//            else {
                $work_request->delete($data["id"]);
                $row3["to_worker"] = $row1->worker;
                $row3["job"] = $row1->job;
                $row3["offer"] = $_POST["offer"];
                $row3["time"] = $_POST["time"];
                $row3["employer"] = $_SESSION["USER"]->id;
                $work_request->insert($row2);
                redirect("employer/home");
//            }
//        } else {
//            $data["id"] = $_GET["url0"];
//            $row1 = $work_request->first($data);
//            $data["id"] = $row1->job;
//            $row2 = $job->first($data);
//            if(!$row1 || $_SESSION["USERTYPE"] != "employer" || $row2->employer != $_SESSION["USER"]->id){
//                redirect("404");
//            }else {
//
//                $view_data["row"] = $row1;
//                $this->view("countworkrequest", $view_data);
//            }
//        }
    }

    public function emprequests(){
        $job = new Job();
        $empl_request = new Employerrequest();
        $work_request = new Workerrequest();
        $data["id"] = $_GET["url0"];
        $row = $job->first($data);
        if($_SESSION["USERTYPE"] == "employer" && $row->employer == $_SESSION["USER"]->id){
            unset($data["id"]);
            $data["job"] = $_GET["url0"];
            $array = $empl_request->where($data);
            $array2 = $work_request-> where($data);
            $response["empl_requests"] = $array;
            $response["work_requests"] = $array2;
            header('Content-Type: application/json');
            echo json_encode($response);

        }
    }
}