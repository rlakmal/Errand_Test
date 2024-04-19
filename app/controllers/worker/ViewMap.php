<?php

class ViewMap extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'worker') {

            $this->view('worker/viewjobmap');
        }
    }
    public function SendLocations($a = '', $b = '', $c = '')
    {

        $worker_category = new WorkerServices();
        $id = $_SESSION['USER']->id;
        $arr['emp_id'] = $id;
        $result = $worker_category->first($arr);
        $category = $result->category;

        $post = new JobPost();
        $locations = $post->findAll();
        $coordinates = array();
        foreach ($locations as $location) {
            // Check if the location field exists and is not empty
            if (!empty($location->location)) {
                $coords = explode(", ", $location->location);
                $job_id = $location->id;
                $coordinates[] = array(
                    "latitude" => $coords[0],
                    "longitude" => $coords[1],
                    "job_id"=> $job_id,
                );
            }
        }

        echo json_encode($coordinates);
    }
}
