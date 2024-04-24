<?php

class EmployerAcc extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'member') {

            $user = new User;

//            if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                $arr["id"] = $_GET["id"];
//                $user->delete($arr["id"]);
//                redirect("admin/employers");
//            }


            $use_id = $_GET["id"];

            $data = $this->create($user, $use_id);
            //show($data);


            $this->view('member/employeracc2', $data);
        } else {
            redirect('home');
        }
    }

    // find user details
    private function create($user, $use_id)
    {

        $arr['id'] = $use_id;

        $result = $user->first($arr);

        $newData["id"] = $use_id;
        $newData['name'] = $result->name;
        $newData['nic'] = $result->nic;
        $newData['city'] = $result->city;
        $newData['address'] = $result->address;
        $newData['dob'] = $result->dob;
        $newData['profile_image'] = $result->profile_image;
        $newData["email"] = $result->email;
        $newData["created"] = $result->created;
        $newData["verified"] = $result->verified;


        $data['newData'] = $newData;

        return $data;
    }

    public function fetchRating($a = '', $b = '', $c = '')
    {
        if (isset($_POST["action"])) {
            $average_rating = 0;
            $total_review = 0;
            $five_star_review = 0;
            $four_star_review = 0;
            $three_star_review = 0;
            $two_star_review = 0;
            $one_star_review = 0;
            $total_user_rating = 0;
            $review_content = array();

            if($_SESSION["USER"]->status == "member"){
                $id = $_POST["id"];

            } else{
                $id = $_SESSION['USER']->id;

            }

            $ratingnreview = new Ratings;
            $arr['emp_id'] = $id;
            $result = $ratingnreview->where($arr);
            $data['data'] = $result;


            foreach ($data['data'] as $row) {
                $review_content[] = array(
                    'user_name'     => $row->user_name,
                    'user_review'   => $row->user_review,
                    'rating'        => $row->rating_data,
                );


                if ($row->rating_data == "5") {
                    $five_star_review++;
                }

                if ($row->rating_data == 4) {
                    $four_star_review++;
                }

                if ($row->rating_data == 3) {
                    $three_star_review++;
                }

                if ($row->rating_data == 2) {
                    $two_star_review++;
                }

                if ($row->rating_data == 1) {
                    $one_star_review++;
                }

                $total_review++;

                $total_user_rating = $total_user_rating + $row->rating_data;
            }

            $average_rating = $total_user_rating / $total_review;

            $output = array(
                'average_rating'    =>    number_format($average_rating, 1),
                'total_review'        =>    $total_review,
                'five_star_review'    =>    $five_star_review,
                'four_star_review'    =>    $four_star_review,
                'three_star_review'    =>    $three_star_review,
                'two_star_review'    =>    $two_star_review,
                'one_star_review'    =>    $one_star_review,
                'review_data'        =>    $review_content
            );

            echo json_encode($output);
        }
    }
}
