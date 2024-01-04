<?php

class RecievedJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $recieved = new EmployerReqWorker;
            $reqbudget = new WorkeRrequestJobs;
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
                $recieved->update($id, $updateData, 'id');;
                redirect('worker/recievedjobs');
            }
            if (isset($_POST['Accept'])) {
                $id = $_POST['id'];
                $updateData = ['status' => 'Accepted'];
                $recieved->update($id, $updateData, 'id');;
                redirect('worker/acceptedjobs');
            }
            if (isset($_POST['ReqBudget'])) {
                $id = $_POST['id'];
                show($_POST);
                $updateData = ['status' => 'Requested'];
                $recieved->update($id, $updateData, 'id');

                unset($_POST['id']);
                unset($_POST['created']);
                unset($_POST['ReqBudget']);
                $reqbudget->insert($_POST);

                redirect('worker/myjobs');
                //redirect('worker/recievedjobs');
            }

            if (!empty($data['data'])) {
                for ($i = 0; $i < count($data['data']); $i++) {
                    $arr_img['id'] = $data['data'][$i]->emp_id;
                    $prof_image = $user->where($arr_img);
                    $images['images'][$i] = $prof_image[0]->profile_image;
                    //3-day countdown
                    $expirationDate = $data['data'][$i]->time_remain + (90); // 3 days in seconds
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
}
