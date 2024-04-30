<?php

class ContactQuery extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'member') {
            $contact = new ContactUs();
            $results = $contact->findAll();
            $data['data'] = $results;


            // if (isset($_POST['email_send'])) {
            //     $email = $_POST['email'];
            //     $message = $_POST['message'];

            //     $mail = require('C:\xampp\htdocs\Errand_Test\app\controllers/mailer.php');
            //     $mail->setFrom("noreply@example.com");
            //     $mail->addAddress($email);
            //     $mail->Subject = "Reply for your Message";
            //     $mail->Body = $message;

            //     try {
            //         $mail->send();
            //         echo "<script>alert('Message sent, please check your inbox.');</script>";
            //     } catch (Exception $e) {

            //         echo "<script>alert('Message could not be sent. Mailer error:');</script>";
            //     }
            //     redirect('member/contactus');
            // }

            $this->view('member/contactform', $data);
        } else {
            redirect('home');
        }
    }
    public function sendingMail($a = '', $b = '', $c = '')
    {

        $id = $_GET['id'];
        $message = $_GET['message'];


        if (empty($message)) {
            echo json_encode('Message cannot be empty');
            return;
        }


        $contact = new ContactUs();
        $arr['id'] = $id;
        $results = $contact->where($arr, 'id');
        $email = $results[0]->email;


        $mail = require('C:\xampp\htdocs\Errand_Test\app\controllers/mailer.php');
        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Reply for your Message";
        $mail->Body = $message;

        try {

            $mail->send();


            $updateData = [
                'status' => 1
            ];
            $contact->update($id, $updateData, 'id');


            echo json_encode('Message sent, please check your inbox ' + $id);
        } catch (Exception $e) {
            // Display error message if sending fails
            echo json_encode('Message could not be sent. Mailer error: ' . $mail->ErrorInfo);
        }
    }
}
