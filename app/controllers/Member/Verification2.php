<?php

class Verification2 extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'crew_member') {
            $worker = new Worker;
            $id = $_GET['id'];
            // show($id);
            $arr['id'] = $id;
            $result = $worker->first($arr);
            $data['data'] = $result;

//            if (!empty($data['data'])) {
//                $worker_name = $data['data'][0]->name;
//            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if($result->verified){
                    $update_q["verified"] = false;
                } else {
                    $update_q["verified"] = true;

                }
                $worker->update($_GET["id"], $update_q);
            }
            $this->view('member/verification2', $data);
        }
    }

}