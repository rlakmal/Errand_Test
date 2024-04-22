<?php

class RecievedJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $recieved = new EmployerReqWorker;
            $accepted_jobs = new AcceptedJobs;
            $reqbudget = new Bargainbgt;
            $user = new User;
            $id = $_SESSION['USER']->id;
            $arr['worker_id'] = $id;
            $results = $recieved->where($arr);
            $data['data'] = $results;


            if (isset($_POST['Reject'])) {
                $id = $_POST['id'];
                $updateData = [
                    'status' => 'Rejected',
                ];
                $recieved->update($id, $updateData, 'id');
                $this->sendNotification($_POST['emp_id'], $_POST['title'], 'Rejected');
                redirect('worker/recievedjobs');
            }
            if (isset($_POST['Accept'])) {
                $id = $_POST['id'];
                //show($_POST);

                $updateData = ['status' => 'Accepted'];
                $recieved->update($id, $updateData, 'id');
                $this->sendNotification($_POST['emp_id'], $_POST['title'], 'Accepted');
                unset($_POST['id']);
                unset($_POST['Accept']);
                //show($_POST);

                $_POST['payment_stat'] = "Pay Now";
                $_POST["type"] = "employer";


                $accepted_jobs->insert($_POST);

                redirect('worker/acceptedjobs');
            }
            if (isset($_POST['ReqBudget'])) {
                $id = $_POST['id'];
                //show($_POST);


                //unset($_POST['id']);
                unset($_POST['city']);
                unset($_POST['description']);
                unset($_POST['emp_name']);
                unset($_POST['status']);
                unset($_POST['created']);
                unset($_POST['ReqBudget']);


                $reqbudget->insert($_POST);
                $updateData = ['status' => 'Requested'];
                $recieved->update($id, $updateData, 'id');

                redirect('worker/myjobs');
                //redirect('worker/recievedjobs');
            }

            if (!empty($data['data'])) {
                for ($i = 0; $i < count($data['data']); $i++) {
                    $arr_img['id'] = $data['data'][$i]->emp_id;
                    $prof_image = $user->where($arr_img);
                    $images['images'][$i] = $prof_image[0]->profile_image;

                    //3-day countdown
                    $expirationDate = $data['data'][$i]->time_remain + (3 * 24 * 60 * 60); // 3 days in seconds
                    $timeRemaining = max(0, $expirationDate - time()); // Ensure the remaining time is non-negative
                    if ($timeRemaining <= 60 && $data['data'][$i]->status == 'Pending') {
                        // Update the status to "expired" in your_table_name
                        $id = $data['data'][$i]->id;
                        $updateData = [
                            'status' => 'Expired',
                        ];
                        $recieved->update($id, $updateData, 'id');


                        redirect('worker/recievedjobs');
                    }
                }

                $viewData = ['data' => $data, 'images' => $images];
                $this->view('worker/recievedjobs', $viewData);
            } else {
                echo ("No data");
                $this->view('worker/recievedjobs');
            }
        }
    }
    public function sendNotification($emp_id, $title, $status)
    {
        $notification = new JobNotify;
        $worker_name = $_SESSION['USER']->name;
        $arr['emp_id'] = $emp_id;
        $arr['message'] = "Your Request to " . $worker_name . " has been " . $status;
        $arr['notification_name'] = $worker_name;
        $arr['active'] = 1;
        //show($arr);
        $notification->insert($arr);
    }
}
