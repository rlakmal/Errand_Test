<?php

class WorkerProf extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {
            $workeremp = new WorkerEmployer();
            $user = new User;
            $worker = new Worker();
            $id = $_GET['id'];
            // show($id);
            $arr['work_id'] = $id;
            $arr2['id'] = $id;
            $result2 = $this->create($workeremp, $id);
            $result = $worker->first($arr2);
            $data = $result2;

//            if (!empty($data['data'])) {
//                $worker_name = $data['data'][0]->name;
//            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                unset($arr["work_id"]);
                $arr["id"] = $_GET["id"];
                $worker->delete($arr["id"]);
                unset($arr["id"]);
//                $arr["username"]= $result["email"];
                $user->delete($result2['newData']["emp_id"]);
                redirect("admin/workers2");
            }

            $this->view('admin/workerprof2', $data);
        }
    }

    private function create($user, $use_id)
    {

        $arr['work_id'] = $use_id;

        $result = $user->first($arr);

        $newData['name'] = $result->name;
        $newData['nic'] = $result->nic;
        $newData['city'] = $result->city;
        $newData['address'] = $result->address;
        $newData['dob'] = $result->dob;
        $newData['profile_image'] = $result->profile_image;
        $newData['certificate_image'] = $result->certificate_image;
        $newData['verified'] = $result->verified;
        $newData["work_id"] = $result->work_id;
        $newData["category"] = $result->category;
        $newData["skills"] = $result->skills;
        $newData["experience"] = $result->experience;
        $newData["email"] = $result->email;
        $newData["emp_id"] = $result->emp_id;
        $newData["gender"] = $result->gender;
        $newData["created"] = $result->created;
        $newData["email_verified"] = $result->email_verified;


        $data['newData'] = $newData;

        return $data;
    }


    public function fetchWorkerRating($a = '', $b = '', $c = '')
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

            $worker_details = new WorkerServices;
            $findId = $worker_details->first(['worker_id' => $id]);
            if ($findId) {
                $emid = $findId->emp_id;
                $ratingnreview = new Ratings;
                $result = $ratingnreview->where(['emp_id' => $emid]);

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

                // Calculate average rating if there are reviews
                if ($total_review > 0) {
                    $average_rating = $total_user_rating / $total_review;
                }
            }

            // Prepare output data
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

            // Output JSON response
            echo json_encode($output);
        } else {
            // If 'id' parameter is not received, send an error response
            echo json_encode(array('error' => 'No id parameter received'));
        }
    }




}