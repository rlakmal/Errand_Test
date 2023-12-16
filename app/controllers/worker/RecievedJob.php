<?php

class RecievedJob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $recieved = new EmployerReqWorker;
            $user = new User;
            $id = $_SESSION['USER']->id;
            $arr['worker_id'] = $id;
            $results = $recieved->where($arr);
            $data['data'] = $results;
            if (!empty($data['data'])) {
                for ($i = 0; $i < count($data['data']); $i++) {
                    $arr_img['id'] = $data['data'][$i]->emp_id;
                    $prof_image = $user->where($arr_img);
                    $images['images'][$i] = $prof_image[0]->profile_image;
                }

                $viewData = ['data' => $data, 'images' => $images];
                $this->view('worker/recievedjobs', $viewData);
            } else {
                echo ("No data");
                $this->view('worker/recievedjobs');
            }
        }
        // echo "this is a about controller";

    }
}
