<?php

class RequestByMe extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $myrequests = new EmployerReqWorker;
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

            // echo "this is a about controller";
            $this->view('employer/myworkerreq', $data);
        }
    }
}
