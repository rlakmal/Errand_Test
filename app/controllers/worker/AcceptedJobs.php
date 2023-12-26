<?php

class AcceptedJobs extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {
            $recieved = new EmployerReqWorker;
            $user = new User;
            $id = $_SESSION['USER']->id;
            $arr['worker_id'] = $id;
            $arr['status'] = 'Accepted';
            $result = $recieved->where($arr, 'id');
            $data['data'] = $result;


            if (!empty($data['data'])) {
                for ($i = 0; $i < count($data['data']); $i++) {
                    $arr_img['id'] = $data['data'][$i]->emp_id;
                    $prof_image = $user->where($arr_img);
                    $images['images'][$i] = $prof_image[0]->profile_image;
                }

                $viewData = ['data' => $data, 'images' => $images];
                $this->view('worker/acceptedjobs', $viewData);
            } else {
                echo ("No data");
                $this->view('worker/acceptedjobs');
            }
        }
    }
}
