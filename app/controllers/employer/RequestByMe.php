<?php

class RequestByMe extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $myrequests = new EmployerReqWorker;
            $accepted_jobs = new AcceptedJobs;
            $newbgt = new Bargainbgt;
            $id = $_SESSION['USER']->id;
            $arr['emp_id'] = $id;
            $result = $myrequests->where($arr, 'id');
            $data['data'] = $result;

            if (isset($_POST['Cancel'])) {
                $id = $_POST['id'];
                $updateData = [
                    'status' => 'Canceled',
                ];
                $myrequests->update($id, $updateData, 'id');
                redirect('employer/myworkerreq');
            }


            // if (isset($_POST['viewRequest'])) {
            //     $id = $_POST['id'];
            //     $arr['id'] = $id;
            //     $bargain = $newbgt->first($arr);
            //     //show($bargain);
            // }

            // echo "this is a about controller";
            if (isset($_POST['pop-accept-btn'])) {
                show($_POST);
                $id = $_POST['id'];
                $updateData = [
                    'status' => 'Accepted',
                    'budget' => $_POST['newbudget'],
                ];
                $myrequests->update($id, $updateData, 'id');
                unset($_POST['id']);
                unset($_POST['pop-accept-btn']);
                $_POST['budget'] = $_POST['newbudget'];
                unset($_POST['newbudget']);
                //show($_POST);
                $_POST['payment_stat'] = "Make Payment";
                $accepted_jobs->insert($_POST);
                //redirect('employer/myworkerreq');
            }
            $this->view('employer/myworkerreq', $data);
        }
    }

    public function viewRequest($a = '', $b = '', $c = '')
    {


        $newbgt = new Bargainbgt;
        $id = $_POST['id'];
        $arr['id'] = $id;
        $bargain = $newbgt->first($arr);
        //show($bargain);
        $data = json_encode($bargain);
        echo $data;
    }
}

