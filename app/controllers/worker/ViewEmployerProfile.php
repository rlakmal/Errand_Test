<?php

class ViewEmployerProfile extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $user = new User;
            $reviews = new Ratings;

            $use_id = $_GET['id'];
            $arr['emp_id'] = $use_id;
            $data = $this->create($user, $use_id);
            $findreviews = $reviews->where($arr, 'id');
            //show($data);
            $viewData = [
                'results' => $findreviews,
                'data' => $data
            ];
            //show($viewData);
            $this->view('worker/viewemprofile', $viewData);
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
