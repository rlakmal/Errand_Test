<?php

class EmployerProfile extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {

            $user = new User;

            $use_id = $_SESSION['USER']->id;

            $data = $this->create($user, $use_id);
            //show($data);

            $this->view('employer/profile', $data);
        } else {
            redirect('home');
        }
    }

    // find user details
    private function create($user, $use_id)
    {

        $arr['id'] = $use_id;

        $result = $user->first($arr);

        $newData['name'] = $result->name;
        $newData['nic'] = $result->nic;
        $newData['city'] = $result->city;
        $newData['address'] = $result->address;
        $newData['dob'] = $result->dob;
        $newData['profile_image'] = $result->profile_image;
        $data['newData'] = $newData;

        return $data;
    }
}
