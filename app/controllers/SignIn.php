<?php

class SignIn extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $user = new User;

        // sign in validation
        if (isset($_POST['signIn'])) {
            //show($_POST);
            $this->signinVerify($user);
        }

        // sign up validation
        if (isset($_POST['signUp'])) {

            if ($user->validate($_POST)) {

                unset($_POST['re-password']);
                unset($_POST['signUp']);

                $_POST['status'] = 'employer';
                $_POST['profile_image'] = 'prof.png';

                $user->insert($_POST);

                redirect('home/signin');
            }
        }

        $data['errors'] = $user->errors;
        $data['loginData'] = $_POST;

        // show($data);
        $this->view('signin', $data);
    }

    private function signinVerify($user)
    {
        // show($_POST);
        if ($user->formData($_POST)) {

            $arr['email'] = $_POST['email'];
            $row = $user->first($arr);

            // $emprow = $employee->first($arr);

            if ($row) {

                $checkpassword = password_verify($_POST['password'], $row->password);

                if ($checkpassword == true) {

                    unset($row->password);

                    $_SESSION['USER'] = $row;

                    // show($row);

                    // check session user
                    $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
                    //    echo $username;

                    if ($row->status == 'employer') {
                        redirect('employer/home');
                    } else if ($row->status == 'worker') {
                        redirect('worker/home');
                    } else if ($row->status == 'admin') {
                        redirect('admin/home');
                    } else if ($row->status == 'crew_member') {
                        redirect('employer/home');
                    }
                } else {
                    $data['errors'] = "";
                    $user->errors = "Invalid Email or Password";
                    $data['errors'] = $user->errors;
                }
            }
        } else {
            $data['errors'] = "";
            $user->errors = "Invalid Email or Password";
            $data['errors'] = $user->errors;
            // echo "Invalid Sign-In";
        }
    }
}
