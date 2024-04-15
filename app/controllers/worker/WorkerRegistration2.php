<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class WorkerRegistration2 extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $user = new User;
        $worker = new Worker;

        if (isset($_POST['worker_register'])) {
            $qdata["email"] = $_POST["email"];

            $email = $user->first($qdata);
            if(!$email){
                $temp_category = $_POST['category'];
                $temp_gender = $_POST['gender'];
                unset($_POST['worker_register']);
                unset($_POST['category']);
                unset($_POST['gender']);
                unset($_POST['re-password']);

                $_POST['status'] = 'worker';

                $password = $_POST['password'];
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $_POST['password'] = $hash;
//            $_POST["verified" =>

                $_POST['verified'] = false;

                $user_id = $user->insert($_POST);

                $_POST['category'] = $temp_category;
                $_POST['gender'] = $temp_gender;
                unset($_POST['name']);
                unset($_POST['nic']);
                unset($_POST['address']);
                unset($_POST['dob']);
                unset($_POST['password']);

                $worker->insert($_POST);

                $qdata["email"] = $_POST["email"];
                $row = $user->first($qdata);


                $this->sendConfirmationEmail($_POST['email'], $_POST['name'], $row->id);

                redirect('verifyprompt&id='.$row->id);

            } else {

                $user ->errors = "Username Already Exists";


            }


        }

        $data['errors'] = $user->errors;
        $data['loginData'] = $_POST;


        $this->view('home/workerRegistration', $data);
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
            $mail->Body    = "Thank you for registering as a worker. Your registration is confirmed. 
                              Please click <a href='$verificationLink'>here</a> to verify your email.";

            $mail->send();
        } catch (Exception $e) {
            // Handle email sending error
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
