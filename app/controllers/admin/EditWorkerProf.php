<?php

class EditWorkerProf extends Controller
{

    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {
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

                $profile_image_name = $_FILES['workerprofile_image']['name'];
//                $certificate_image_name = $_FILES['workergs_image']['name'];
                if ($profile_image_name != null) {
                    $_POST['profile_image'] = $this->uploadImage($_FILES['workerprofile_image']['tmp_name'], $profile_image_name, '/assets/images/worker/profileImages/');
                }
//                if ($certificate_image_name != null) {
//                    $_POST['certificate_image'] = $this->uploadImage($_FILES['workergs_image']['tmp_name'], $certificate_image_name, '/assets/images/worker/certifiImages/');
//                }
                //show($_POST);

                $user_id = $_POST["emp_id"];
                $email = $_POST["email"];
                $nic = $_POST["nic"];

                unset($_POST["work_id"]);
                unset($_POST["emp_id"]);
                unset($_POST["email"]);
                unset($_POST["nic"]);
                unset($_POST["edit"]);
                $worker->update($id,$_POST);

                $udata["profile_image"] = $_POST['profile_image'];
                $udata["nic"] = $nic;
                $udata["city"] = $_POST['city'];
                $udata["address"] = $_POST['address'];
                $udata["dob"] = $_POST['dob'];
                $udata["name"] = $_POST['name'];

                $user->update($user_id, $udata);

                redirect("admin/workerprof?id=".$id);
            }

            $this->view('admin/editworkerprof', $data);
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
        $newData['profile_image'] = $result->profile_image;
//        $newData['certificate_image'] = $result->certificate_image;
        $newData['verified'] = $result->verified;
        $newData["work_id"] = $result->work_id;
        $newData["category"] = $result->category;
        $newData["skills"] = $result->skills;
        $newData["experience"] = $result->experience;
        $newData["email"] = $result->email;
        $newData["emp_id"] = $result->emp_id;
        $newData["gender"] = $result->gender;
        $newData["created"] = $result->created;



        $data['newData'] = $newData;

        return $data;
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