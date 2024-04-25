<?php
class ResetPwd extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        if (isset($_POST['reset'])) {

            unset($_POST['reset']);
            //show($_POST);

            $token = $_GET['token'];
            $token_hash = hash("sha256", $token);
            //show($token);
            $arr['reset_token_hash'] = $token_hash;
            $password = $_POST['password'];
            $user = new User();
            $results = $user->first($arr);
            $updateData = [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'reset_token_hash' => null,
                'reset_token_expires_at' => null
            ];
            if ($results === null) {
                die("token not found");
            }

            if (strtotime($results->reset_token_expires_at) <= time()) {
                die("token has expired");
            }
            if ($_POST["password"] !== $_POST["password_confirmation"]) {
                die("Passwords must match");
            }

            if (strlen($_POST["password"]) < 8) {
                die("Password must be at least 8 characters");
            }

            if (!preg_match("/[a-z]/i", $_POST["password"])) {
                die("Password must contain at least one letter");
            }

            if (!preg_match("/[0-9]/", $_POST["password"])) {
                die("Password must contain at least one number");
            }



            $this->resetPssword($_POST, $results->id, $updateData);
        }

        $this->view('resetpassword');
    }
    public function resetPssword($data, $id, $updateData)
    {
        $user = new User();
        //show($id);
        //show($updateData);
        $user->update($id, $updateData, 'id');
        redirect('home/signin');
    }
}
