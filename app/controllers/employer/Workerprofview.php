<?php

class Workerprofview extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $worker = new WorkerServices;
            $worker_details = new Worker;
            $request = new EmployerReqWorker;
            $reviews = new Ratings;
            $id = $_GET['id'];
            // show($id);
            $arr['emp_id'] = $id;
            $foundworker = $worker->first($arr);
            $findreviews = $reviews->where($arr, 'id');
            $worker_id = $foundworker->worker_id;
            $worker_name = $foundworker->name;
            $data = $this->create($worker_details, $worker_id);
            $viewData = [
                'results' => $findreviews,
                'data' => $data
            ];
            //show($data);

            // if (!empty($data['data'])) {
            //     $worker_name = $data['data'][0]->name;
            // }
            if (isset($_POST['reqWorker'])) {
                unset($_POST['reqWorker']);
                $emp_id = $_SESSION['USER']->id;
                $emp_name = $_SESSION['USER']->name;
                $wkr_id = $id;
                $_POST['emp_id'] = $emp_id;
                $_POST['emp_name'] = $emp_name;
                $_POST['worker_id'] = $wkr_id;
                $_POST['worker_name'] = $worker_name;
                $_POST['status'] = "Pending";
                $_POST['time_remain'] = time();
                $job_image_name = $_FILES['job_image']['name'];
                $job_image1_name = $_FILES['job_image1']['name'];
                if ($job_image_name != null) {
                    $_POST['job_image'] = $this->uploadImage($_FILES['job_image']['tmp_name'], $job_image_name, '/assets/images/jobimages/');
                }
                if ($job_image1_name != null) {
                    $_POST['job_image1'] = $this->uploadImage($_FILES['job_image1']['tmp_name'], $job_image1_name, '/assets/images/jobimages/');
                }
                $request->insert($_POST);
                //show($_POST);
                $message = "You have a new request from " . $emp_name;
                $this->sendNotification($wkr_id, $message, $emp_name);
            }
            $this->view('employer/workerprof', $viewData);
        }
    }
    private function uploadImage($img, $img_name, $location)
    {
        $timestamp = time();
        $file_info = pathinfo($img_name);
        $file_extension = $file_info['extension'];
        $file_name = $file_info['filename'];
        $new_file_name = $file_name . '_' . $timestamp . '.' . $file_extension;

        $target_file = PUBROOT . $location . $new_file_name;
        if (move_uploaded_file($img, $target_file)) {
            return $new_file_name;
        } else {
            return false;
        }
    }
    public function sendNotification($worker_id, $message, $emp_name)
    {
        $notify = new JobNotify;

        $data = [
            'emp_id' => $worker_id,
            'message' => $message,
            'notification_name' => $emp_name,
            'active' => 1,
        ];
        $notify->insert($data);
    }

    private function create($worker_details, $worker_id)
    {
        $arr['id'] = $worker_id;
        $result = $worker_details->where($arr, 'created');
        return $result;
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
