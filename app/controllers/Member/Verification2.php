<?php

class Verification2 extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {
            $workeremp = new WorkerEmployer();
            $user = new User;
            $worker = new Worker();
            $id = $_GET['id'];
            // show($id);
            $arr['work_id'] = $id;
            $arr2['id'] = $id;
            $result2 = $this->create($workeremp, $id);
            $result = $worker->first($arr2);
            $data = $result2;

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
            $this->view('member/verification4', $data);
        }
    }
    private function create($user, $use_id)
    {

        $arr['work_id'] = $use_id;

        $result = $user->first($arr);

        $newData['name'] = $result->name;
        $newData['nic'] = $result->nic;
        $newData['city'] = $result->city;
        $newData['address'] = $result->address;
        $newData['dob'] = $result->dob;
        $newData['profile_image'] = $result->image;
        $newData['verified'] = $result->verified;
        $newData["id"] = $result->work_id;
        $newData["category"] = $result->category;

        $data['newData'] = $newData;

        return $data;
    }

}