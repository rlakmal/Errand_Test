<?php

class RequestByMe extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $myrequests = new EmployerReqWorker;
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
            if (isset($_POST['pop-accept-btn'])) {
                // show($_POST);
                $id = $_POST['id'];
                $updateData = [
                    'status' => 'Accepted',
                ];
                $myrequests->update($id, $updateData, 'id');
                redirect('employer/myworkerreq');
            }
            $this->view('employer/myworkerreq2', $data);
        }
    }

    public function viewRequest($a = '', $b = '', $c = '')
    {
        // redirect("employer/view_request");
        $newbgt = new Bargainbgt;
        //show($_POST);
        $id = $_POST['id'];
        $arr['id'] = $id;
        $bargain = $newbgt->first($arr);
        //show($bargain);
        $data = json_encode($bargain);
        echo $data;
    }
}