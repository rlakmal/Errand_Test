<?php

class EditEmployerAcc extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
//        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($_SESSION['USER']->status == 'admin') {
            $user = new User;
            $use_id = $_GET["id"];
            // edit for get Data
            $result =  $this->create($user, $use_id);


            if (isset($_POST['edit'])) {

                unset($_POST['edit']);
                //show($_POST);
                $profile_image_name = $_FILES['profile_image']['name'];
                if ($profile_image_name != null) {
                    $_POST['profile_image'] = $profile_image_name;
                }

                //show($_POST);
                $this->uploadImage($_FILES['profile_image']['tmp_name'], $profile_image_name, '/assets/images/profileImages/');

                $user->update($use_id, $_POST);
                redirect("admin/employeracc?id=".$use_id);
            }

            $this->view('admin/editemployeracc', $result);
        } else {
            redirect('home');
        }
    }


    // get profile data for bind to the tags
    private function create($user, $use_id)
    {
        $arr['id'] = $use_id;

        $result = $user->first($arr);

        $newData['id'] = $result->id;
        $newData['name'] = $result->name;
        $newData['nic'] = $result->nic;
        $newData['city'] = $result->city;
        $newData['address'] = $result->address;
        $newData['dob'] = $result->dob;
        $newData['profile_image'] = $result->profile_image;
        $newData['email'] = $result->email;


        $data['newData'] = $newData;

        return $data;
    }

    // update profile data

    public function uploadImage($img, $img_name, $location)
    {
        $target = PUBROOT . $location . $img_name;
        return move_uploaded_file($img, $target);
    }
}