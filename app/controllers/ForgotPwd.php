<?php
class ForgotPwd extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $user = new User();

        if (isset($_POST['fgtpwd'])) {
            $email = $_POST['email'];
            $arr['email'] = $email;
            $results = $user->first(['email' => $email]);
            if (!$results) {
                $this->view('forgetpassword', ['errors' => 'Email not found']);
                return;
            } else {
                $id = $results->id;
            }

            unset($_POST['fgtpwd']);
            $token = bin2hex(random_bytes(16));
            $token_hash = hash("sha256", $token);
            $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
            $updateData = [
                'reset_token_hash' => $token_hash,
                'reset_token_expires_at' => $expiry
            ];

            // Assuming $user->update() method works correctly
            $user->update($id, $updateData, 'id');

            // Include mailer script and send email
            $mail = require(__DIR__ . '/mailer.php');
            $mail->setFrom("noreply@example.com");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = <<<END
            Click <a href="http://localhost/Errand_test/public/home/resetpasswrd?token=$token">here</a> 
            to reset your password.
            END;

            try {
                $mail->send();
                echo "Message sent, please check your inbox.";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
            }
        } else {
            $this->view('forgetpassword');
        }
    }
}
