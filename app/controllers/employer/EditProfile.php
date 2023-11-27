<?php

class EditProfile extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $user = new User;
            $use_id = $_SESSION['USER']->id;
            // edit for get Data
            $result =  $this->getProfileData($user, $use_id);
            show($result);

            if (isset($_POST['edit'])) {

                unset($_POST['edit']);
                //show($_POST);
                $profile_image_name = $_FILES['profile_image']['name'];
                if ($profile_image_name != null) {
                    $_POST['profile_image'] = $profile_image_name;
                }

                //show($_POST);
                $this->uploadImage($_FILES['profile_image']['tmp_name'], $profile_image_name, '/assets/images/profileImages/');

                $this->UpdateProfile($user, $use_id, $_POST);
            }

            $this->view('employer/editprofile', $result);
        } else {
            redirect('home');
        }
    }


    // get profile data for bind to the tags
    private function getProfileData($user, $use_id)
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

    // update profile data
    private function UpdateProfile($user, $use_id, $data)
    {
        $user->update($use_id, $data, 'id');
        redirect('employer/profile');
    }

    public function uploadImage($img, $img_name, $location)
    {
        $target = PUBROOT . $location . $img_name;
        return move_uploaded_file($img, $target);
    }
}
