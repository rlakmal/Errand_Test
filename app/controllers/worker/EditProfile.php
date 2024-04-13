<?php

class EditProfile extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $workerdet = new WorkerServices;
            $worker = new Worker;
            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;
            $foundworker = $workerdet->first($arr);
            $worker_id = $foundworker->worker_id;

            $data = $this->create($worker, $worker_id);

            if (isset($_POST['edit'])) {
                unset($_POST['edit']);


                $profile_image_name = $_FILES['workerprofile_image']['name'];
                if ($profile_image_name != null) {
                    $_POST['profile_image'] = $this->uploadImage($_FILES['workerprofile_image']['tmp_name'], $profile_image_name, '/assets/images/worker/profileImages/');
                }
                //show($_POST);
                $this->UpdateProfile($worker, $worker_id, $_POST);
            }

            $this->view('worker/editworkerprofile', $data);
        }
    }
    private function create($worker, $worker_id)
    {

        $array['id'] = $worker_id;
        $result = $worker->first($array);
        $newData['name'] = $result->name;
        $newData['city'] = $result->city;
        $newData['category'] = $result->category;
        $newData['address'] = $result->address;
        $newData['gender'] = $result->gender;
        $newData['dob'] = $result->dob;
        $newData['skills'] = $result->skills;
        $newData['expierience'] = $result->expierience;
        $newData['profile_image'] = $result->profile_image;
        $data['newData'] = $newData;

        return $data;
    }

    private function UpdateProfile($worker, $worker_id, $data)
    {
        $worker->update($worker_id, $data, 'id');
        redirect('worker/workerprofile');
    }

    private function uploadImage($img, $img_name, $location)
    {
        $timestamp = time();
        $file_info = pathinfo($img_name);
        $file_extension = $file_info['extension'];
        $file_name = $file_info['filename'];
        $new_file_name = $file_name . '_' . $timestamp . '.' . $file_extension;

        $target_file = PUBROOT . $location . $new_file_name;
        if (move_uploaded_file($img, $target_file)) {
            return $new_file_name;
        } else {
            return false;
        }
    }
}
