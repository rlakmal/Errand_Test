<?php

class SignVerify extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $user = new User;

        // sign in validation
        if (isset($_POST['signIn'])) {
            $this->signinVerify($user);
        }
        if (isset($_POST['signUp'])) {

            if ($user->validate($_POST)) {
                //show($_POST);

                unset($_POST['re-password']);
                unset($_POST['signUp']);
                $_POST['status'] = 'employer';
                $_POST['profile_image'] = 'prof.png';
                //show($_POST);



                $user->insert($_POST);

                redirect('home/signinverify');
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

                        $id = $row->id;
                        $email = $row->email;
                        $otp = $this->generateOTP();
                        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
                        $updateData = [
                            'reset_token_hash' => $otp,
                            'reset_token_expires_at' => $expiry
                        ];
                        $user->update($id, $updateData, 'id');

                        $mail = require(__DIR__ . '/mailer.php');
                        $mail->setFrom("noreply@example.com");
                        $mail->addAddress($email);
                        $mail->Subject = "Verify Email";
                        $mail->Body = <<<END
            Use this OTP to verify your email <a>$otp</a> 
            END;
                        try {
                            $mail->send();
                            echo "<script>alert('Message sent, please check your inbox.');</script>";
                        } catch (Exception $e) {

                            echo "<script>alert('Message could not be sent. Mailer error:');</script>";
                        }
                        redirect('employer/verifyemp');
                    } else if ($row->status == 'worker') {
                        $id = $row->id;
                        $email = $row->email;
                        $otp = $this->generateOTP();
                        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
                        $updateData = [
                            'reset_token_hash' => $otp,
                            'reset_token_expires_at' => $expiry
                        ];
                        $user->update($id, $updateData, 'id');

                        $mail = require(__DIR__ . '/mailer.php');
                        $mail->setFrom("noreply@example.com");
                        $mail->addAddress($email);
                        $mail->Subject = "Verify Email";
                        $mail->Body = <<<END
            Use this OTP to verify your email <a>$otp</a> 
            END;
                        try {
                            $mail->send();
                            echo "<script>alert('Message sent, please check your inbox.');</script>";
                        } catch (Exception $e) {

                            echo "<script>alert('Message could not be sent. Mailer error:');</script>";
                        }
                        redirect('worker/verifyworker');
                    } else if ($row->status == 'admin') {
                        redirect('admin/home');
                    } else if ($row->status == 'member') {

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
    public function forgetPswwd($a = '', $b = '', $c = '')
    {
        $this->view('forget-password');
    }
    function generateOTP()
    {
        $otp = mt_rand(100000, 999999);
        return $otp;
    }
}
