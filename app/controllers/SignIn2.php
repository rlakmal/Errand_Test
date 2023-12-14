<?php

//require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class SignIn2 extends Controller
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
                $_POST['verified'] = false;

                $user->insert($_POST);

                $qdata["email"] = $_POST["email"];
                $row = $user->first($qdata);

                $this->sendConfirmationEmail($_POST['email'], $_POST['name'], $row->id);


                redirect('verifyprompt&id=' . $row->id);
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
                    $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
                    //    echo $username;

                    if ($row->status == 'employer') {
                        if ($row->verified) {
                            redirect('employer/home');
                        } else {
                            redirect('verifyprompt&id=' . $row->id);
                        }
                    } else if ($row->status == 'worker') {
                        if ($row->verified) {
                            redirect('worker/home');
                        } else {
                            redirect('verifyprompt&id=' . $row->id);
                        }
                    } else if ($row->status == 'admin') {
                        redirect('admin/home');
                    } else if ($row->status == 'crew_member') {
                        redirect('member/home');
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
    private function sendConfirmationEmail($email, $name, $user_id)
    {
        //        require 'http://localhost/Errand_Test/vendor/PHPMailer/PHPMailer.php'; // Adjust the path accordingly
        //        require 'http://localhost/Errand_Test/vendor/PHPMailer/Exception.php';
        //        require 'http://localhost/Errand_Test/vendor/PHPMailer/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = '7bb845361170d5';
            $mail->Password   = '26ad98a010271d';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525;


            // Recipients
            $mail->setFrom('your-email@example.com', 'Your Name');
            $mail->addAddress($email, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Registration Confirmation';
            $verificationLink = ROOT . '/verify-email?id=' . $user_id;
            $mail->Body    = "Thank you for registering as an Employer. Your registration is confirmed. 
                              Please click <a href='$verificationLink'>here</a> to verify your email.";

            $mail->send();
        } catch (Exception $e) {
            // Handle email sending error
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
