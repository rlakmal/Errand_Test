<?php

class WorkerProfile extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $workerdet = new WorkerServices;
            $worker = new Worker;
            $reviews = new Ratings;

            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;
            $foundworker = $workerdet->first($arr);
            $worker_id = $foundworker->worker_id;
            $findreviews = $reviews->where($arr, 'id');
            $data = $this->create($worker, $worker_id);
            $viewData = [
                'results' => $findreviews,
                'data' => $data
            ];
            //show($viewData);
            $this->view('worker/workerprofile', $viewData);
        }
    }
    private function create($worker, $worker_id)
    {

        $array['id'] = $worker_id;
        $result = $worker->first($array);
        $newData['name'] = $result->name;
        $newData['city'] = $result->city;
        $newData['category'] = $result->category;
        $newData['address'] = $result->address;
        $newData['gender'] = $result->gender;
        $newData['dob'] = $result->dob;
        $newData['skills'] = $result->skills;
        $newData['expierience'] = $result->expierience;
        $newData['profile_image'] = $result->profile_image;
        $newData['certificate_image'] = $result->certificate_image;
        $newData['verified'] = $result->verified;
        $data['newData'] = $newData;

        return $data;
    }
    public function WorkerProfileRating($a = '', $b = '', $c = '')
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

            $ratingnreview = new Ratings;
            $arr['emp_id'] = $_SESSION['USER']->id;
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
