<?php

class Myjob extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {

        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {

            try {

                $jobPost = new EmpPost;
                $mypost  = new JobPost;
                $emp_id = $_SESSION['USER']->id;
                $arr['emp_id'] = $emp_id;

                // view employer posted jobs            
                $result = $jobPost->where($arr, 'job_created');
                $data['data'] = $result;


                // job delete
                if (isset($_POST['jobDelete'])) {
                    $jobId = $_POST['id'];
                    // echo $jobId;
                    $this->jobDelete($jobId, $mypost);
                }

                // job update 
                if (isset($_POST['editPost'])) {
                    unset($_POST['editPost']);
                    $this->jobUpdate($_POST, $jobPost);
                }
            } catch (Exception $e) {
                //throw $th;
            }

            $this->view('employer/myjob', $data);
        } else {
            redirect('home');
        }
    }

    // each employer created job delete method
    private function jobDelete($data, $mypost)
    {
        // show($mypost);
        // show($data);

        $mypost->delete($data, 'id');
        redirect('employer/myjob');
    }

    // each employer created job update method
    private function jobUpdate($data, $jobPost)
    {
        show($data);
        $id = $data['id'];
        unset($data['id']);

        date_default_timezone_set('Asia/Kolkata');

        $date = new DateTime();
        $formattedTime = $date->format('Y-m-d H:i:s');
        $data['job_created'] = $formattedTime;
        $jobPost->update($id, $data, 'id');
        redirect('employer/myjob');
    }
}
