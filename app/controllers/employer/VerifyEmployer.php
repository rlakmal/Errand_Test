<?php

class VerifyEmployer extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            if (isset($_POST['submit_otp'])) {
                $otp = $_POST['otp'];
                $employer = new User();
                $id = $_SESSION['USER']->id;
                $arr['id'] = $id;
                $email = $_SESSION['USER']->email;
                $results = $employer->first($arr);
                if ($results) {
                    if ($results->reset_token_hash  == $otp) {
                        $updateData = [
                            'reset_token_hash' => null,
                            'reset_token_expires_at' => null
                        ];
                        $employer->update($id, $updateData, 'id');
                        redirect('employer/home');
                    } else {
                        echo "<script>alert('Invalid OTP');</script>";
                    }
                }
            }

            $this->view('employer/everifyemployer');
        }
    }
}
