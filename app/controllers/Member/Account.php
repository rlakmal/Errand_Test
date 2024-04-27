<?php

class Account extends Controller
{
    public function index($a = '', $b = '', $c = ''){

        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            $member = new CrewMember();
            $user = new User();

            $qdata["emp_id"] = $_SESSION["USER"]->id;
            $data = $member->where($qdata);
//            var_dump($data);

            if($_SERVER["REQUEST_METHOD"] == "POST"){


                $exists = $user->where(["email" => $_POST["email"]]);
                if($exists){
                    redirect("member/account");
                }

                if(trim($_POST["password"]) != ""){

                    $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);

                } else {
                    unset($_POST["password"]);
                }

                $profile_image_name = $_FILES['profile_image']['name'];
                if ($profile_image_name != null) {
                    $_POST['profile_image'] = $profile_image_name;
                    $target = PUBROOT.'/assets/images/member/profileImages/'.$profile_image_name;
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], $target);

                    $_SESSION["USER"]->profile_image = $profile_image_name;
                }

                //show($_POST);


//                var_dump($_POST);

                $member->update($qdata["emp_id"], $_POST, "emp_id");
                $user->update($qdata["emp_id"], $_POST);

                redirect("member/account");

            }



            $data["data"] = (array) $data;

            $this->view("member/account", $data);

        }



    }


}