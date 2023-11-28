<?php

class WorkerRegistration extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $user = new User;
        $worker = new Worker;

        // // sign up validation
        if (isset($_POST['worker_register'])) {

            //     if ($user->validate($_POST)) {
            $temp_category = $_POST['category'];
            $temp_gender = $_POST['gender'];
            unset($_POST['worker_register']);
            unset($_POST['category']);
            unset($_POST['gender']);
            unset($_POST['re-password']);

            $_POST['status'] = 'worker';

            //         $user->insert($_POST);
            //         redirect('home/signin');
            //     }
            // }

            // $data['errors'] = $user->errors;
            // $data['loginData'] = $_POST;

            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $_POST['password'] = $hash;

            $user->insert($_POST);
            $_POST['category'] = $temp_category;
            $_POST['gender'] = $temp_gender;
            // unset($_POST['name']);
            unset($_POST['nic']);
            unset($_POST['address']);
            // unset($_POST['city']);
            unset($_POST['dob']);
            unset($_POST['password']);
            $worker->insert($_POST);

            redirect('home');
        }
        $this->view('home/workerRegistration');
    }
}
