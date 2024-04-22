<?php

class EmployerAcc extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $user = new User;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $arr["id"] = $_GET["id"];
                $user->delete($arr["id"]);
                redirect("admin/employers");
            }


            $use_id = $_GET["id"];

            $data = $this->create($user, $use_id);
            //show($data);


            $this->view('admin/employeracc2', $data);
        } else {
            redirect('home');
        }
    }

    // find user details
    private function create($user, $use_id)
    {

        $arr['id'] = $use_id;

        $result = $user->first($arr);

        $newData["id"] = $use_id;
        $newData['name'] = $result->name;
        $newData['nic'] = $result->nic;
        $newData['city'] = $result->city;
        $newData['address'] = $result->address;
        $newData['dob'] = $result->dob;
        $newData['profile_image'] = $result->profile_image;
        $newData["email"] = $result->email;
        $newData["created"] = $result->created;
        $newData["verified"] = $result->verified;


        $data['newData'] = $newData;

        return $data;
    }
}
