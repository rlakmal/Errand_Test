<?php

class Home extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        if (isset($_POST['send_btn'])) {
            $contact = new ContactUs;
            //show($_POST);
            unset($_POST['send_btn']);
            //show($_POST);
            $contact->insert($_POST);
            redirect('home');
        }
        // require_once 'Model.php';
        // echo "this is a home controller";





        // $user = new User;

        // $arr['first_name'] = 'dilum';
        // $result= $model->where($arr);

        // $arr['first_name'] = 'thiran';
        // $arr['user_email'] = 'thiran@gmail.com';
        // $arr['user_password'] = '2536';
        // $result= $model->insert($arr);

        // $result= $model->delete(5);

        // $arr['id'] = 2;
        // $arr['first_email'] = 'thiran';
        // $result= $user->findAll(); 

        // show($result);

        if (!empty($_SESSION['USER'])) {

            unset($_SESSION['USER']);
        }



        $this->view('home/new_home');
    }
}
