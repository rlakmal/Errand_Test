<?php

//namespace controllers\worker;

//use controllers\Job;
use models\Employerrequest;
use models\JobPage;
use models\User;
use models\Workerrequest;

class Request extends \Controller
{

    protected $request_errors = [];



    public function create_work(){
//        if ($_SESSION["REQUEST_METHOD"] == "POST"){
            $work_request = new  Workerrequest();
            $array["job"] = $_POST["job"];
            $array["worker"] = $_SESSION["USER"] -> id;
            $row = $work_request->first($array);

//            if($row){
//                $this->request_errors["already_exists"] = "Request Already Exists";
//                $data["errors"] = $this->request_errors;
//                $this->view("createworkrequest", $data);

//            } else {
                $_POST = array_merge($_POST, $array);
                if($work_request->validate1($_POST)){
                    $work_request->insert($_POST);
                    redirect("worker/home");
                }
//            }
//        }
//        else {
//            $this->view("createworkrequest");
//
//        }
    }
    public function edit_work(){
        $work_request = new Workerrequest();
//        if ($_SESSION["REQUEST_METHOD"] == "POST"){
            $data["id"] = $_POST["request"];
            $row1 = $work_request->first($data);

            if(!$row1 || $_SESSION["USER"]->status != "worker" || $row1->worker != $_SESSION["USER"]->id){
                redirect("404");

            } else {
                $array["offer"] = $_POST["offer"];
                $array["time"] = $_POST["time"];
//                $array[""]
                $work_request->update($data["id"], $array);
                redirect("worker/home");

            }
//        } else {
//            $data["id"] = $_GET["url0"];
//            $row1 = $work_request->first($data);
//
//            if(!$row1 || $_SESSION["USERTYPE"] != "employer" || $row1->employer != $_SESSION["USER"]->id){
//                redirect("404");
//
//            } else {
//                $view_data["row"] = $row1;
//                $this->view("editworkrequest", $view_data);
//            }
//        }
    }
    public function counter_emp(){
        $work_request = new Workerrequest();
        $empl_request = new Employerrequest();
//        if ($_SESSION["REQUEST_METHOD"] == "POST"){
            $data["id"] = $_POST["request"];
            $row1 = $empl_request->first($data);
//            if(!$row1 || $_SESSION["USERTYPE"] != "worker" || $row1->worker != $_SESSION["USER"]->id){
//                redirect("404");
//            } else {
                $empl_request->delete($data["id"]);
                $row2["worker"] = $row1->to_worker;
                $row2["job"] = $row1->job;
                $row2["offer"] = $_POST["offer"];
                $row2["time"] = $_POST["time"];
                $work_request->insert($row2);
//                redirect("myrequests");

                redirect("worker/home");

//            }
//        } else {
//            $data["id"] = $_GET["url0"];
//            $row1 = $empl_request->first($data);
//            if(!$row1 || $_SESSION["USERTYPE"] != "worker" || $row1->worker != $_SESSION["USER"]->id) {
//                redirect("404");
//            }else {
//                $view_data["row"] = $row1;
//                $this->view("countemprequest", $view_data);
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