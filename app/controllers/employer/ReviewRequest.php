
<?php

class ReviewRequest extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $accepted_jobs = new AcceptedJobs;
            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;
            $arr['payment_stat'] = "paid";
            $results = $accepted_jobs->where($arr);
            $data['data'] = $results;
            //show($data);
            $this->view('employer/reviewrequest', $data);
        }
    }
    public function markAsCompleted($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $id = $_GET['id'];
            $job_id = $_GET['job_id'];
            if ($job_id != 0) {
                $job = new JobPost();
                $jobupdateData = [
                    'job_status' => 'Completed',
                ];
                $job->update($job_id, $jobupdateData, 'id');
            }
            $accepted_jobs = new AcceptedJobs;
            $updateData = [
                'review_status' => 'Completed',
            ];
            $accepted_jobs->update($id, $updateData, 'id');
            echo "Job completed Successfully";
        }
    }

    public function handleRating($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $ratingnreview = new Ratings;
            $accepted_jobs = new AcceptedJobs;
            if (isset($_POST["rating_data"])) {
                $worker_id = $_POST['worker_id'];
                $id = $_POST['id'];
                $updateData = [
                    'review_status' => 'Job Completed',
                ];
                $accepted_jobs->update($id, $updateData, 'id');
                $_POST['emp_id'] = $worker_id;
                unset($_POST['worker_id']);
                unset($_POST['id']);
                show($_POST);
                $ratingnreview->insert($_POST);
                echo "Your Review & Rating Successfully Submitted";
            }
        } elseif ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $ratingnreview = new Ratings;
            $accepted_jobs = new AcceptedJobs;
            if (isset($_POST["rating_data"])) {
                $id = $_POST['id'];
                $updateData = [
                    'worker_review' => 'Job Completed',
                ];
                $accepted_jobs->update($id, $updateData, 'id');
                unset($_POST['id']);
                show($_POST);
                $ratingnreview->insert($_POST);
                echo "Your Review & Rating Successfully Submitted";
            }
        }
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

            if ($_SESSION["USER"]->status == "admin") {
                $id = $_POST["id"];
            } else {
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


    public function chat_data($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            try {
                $worker = new WorkerServices();
                $chatData = new ChatData();
                $chat = new Chat();
                $toId = $_POST['to_id'];
                $fromId = $_SESSION['USER']->id;
                $userarr['from_id'] = $fromId;
                $userarr['to_id'] = $toId;
                $chatId = $chat->where($userarr, 'chat_id');

                $array['emp_id'] = $toId;
                $empData = $worker->first($array);


                if ((empty($chatId))) {

                    // insert the chat conversation
                    $arr = [];
                    $arr['from_id'] = $fromId;
                    $arr['to_id'] = $toId;

                    $chat->insert($arr);

                    // Again check session user chat conversation & get the ID
                    $chatId = $chat->where($arr);
                }
                $chatMsgs = $this->chatbox($chatId[0]->chat_id);

                $chatAllData['chat'] = $chatId;
                $chatAllData['chatMsgs'] = $chatMsgs;
                $chatAllData['log_user'] = $fromId;
                $chatAllData['empImage'] = $empData->profile_image;

                echo json_encode($chatAllData);
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else if (($username != 'User' && $_SESSION['USER']->status == 'worker')) {
            try {
                $emp = new User();
                $chatData = new ChatData();
                $chat = new Chat();
                $fromId = $_POST['to_id'];
                $toId = $_SESSION['USER']->id;
                $userarr['from_id'] = $fromId;
                $userarr['to_id'] = $toId;
                $chatId = $chat->where($userarr, 'chat_id');
                $array['id'] = $fromId;
                $empData = $emp->first($array);

                if ((empty($chatId))) {

                    // insert the chat conversation
                    $arr = [];
                    $arr['from_id'] = $fromId;
                    $arr['to_id'] = $toId;

                    $chat->insert($arr);

                    // Again check session user chat conversation & get the ID
                    $chatId = $chat->where($arr);
                }
                $chatMsgs = $this->chatbox($chatId[0]->chat_id);

                $chatAllData['chat'] = $chatId;
                $chatAllData['chatMsgs'] = $chatMsgs;
                $chatAllData['log_user'] = $toId;
                $chatAllData['empImage'] = $empData->profile_image;

                echo json_encode($chatAllData);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
    private function chatbox($chat_id)
    {
        $arr['chat_id'] = $chat_id;

        $chatData = new ChatData();
        $chatMsg = $chatData->where($arr, 'chat_id');

        return $chatMsg;
    }
    public function save_data($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer' || $_SESSION['USER']->status == 'worker') {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $chatData = new ChatData();
                $chatData->insert($_POST);
            } else {

                redirect("404");
            }
        } else {
            redirect("404");
        }
    }
}
