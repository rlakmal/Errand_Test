<?php

class ViewJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $job = new EmpPost;
            $id = $_GET['id'];
            $arr['id'] = $id;
            $results = $job->where($arr);
            //show($results);
            $data['data'] = $results;

            $this->view('employer/viewjob', $data);
        }
    }
    public function fetchEmpRating($a = '', $b = '', $c = '')
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $average_rating = 0;
            $total_review = 0;
            $five_star_review = 0;
            $four_star_review = 0;
            $three_star_review = 0;
            $two_star_review = 0;
            $one_star_review = 0;
            $total_user_rating = 0;
            $review_content = array();
            $ratingnreview = new Ratings;
            $result = $ratingnreview->where(['emp_id' => $id]);

            foreach ($result as $row) {
                $review_content[] = array(
                    'user_name'     => $row->user_name,
                    'user_review'   => $row->user_review,
                    'rating'        => $row->rating_data,
                );

                // Count star ratings
                switch ($row->rating_data) {
                    case "5":
                        $five_star_review++;
                        break;
                    case "4":
                        $four_star_review++;
                        break;
                    case "3":
                        $three_star_review++;
                        break;
                    case "2":
                        $two_star_review++;
                        break;
                    case "1":
                        $one_star_review++;
                        break;
                }

                $total_review++;
                $total_user_rating += $row->rating_data;
            }

            if ($total_review > 0) {
                $average_rating = $total_user_rating / $total_review;
            }


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
        } else {
            // If 'id' parameter is not received, send an error response
            echo json_encode(array('error' => 'No id parameter received'));
        }
    }
}
