<?php

use LDAP\Result;

class Emphome extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {

        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {

            try {
                $jobPost = new JobPost;
                $post = new EmpPost;
                // $results = $post->findAll('job_created');
                // show($results);
                // All posted jobs
                $data = $this->getAllJob($post);

                // Post job
                if (isset($_POST['postJob'])) {

                    // data validation 
                    unset($_POST['postJob']);
                    $emp_id = $_SESSION['USER']->id;
                    $emp_name = $_SESSION['USER']->name;
                    $_POST['emp_name'] = $emp_name;
                    $_POST['emp_id'] = $emp_id;
                    $jobPost->insert($_POST);
                    redirect('employer/home');
                }
            } catch (Exception $e) {
                //throw $th;
            }

            $this->view('employer/emphome', $data);
        } else {
            redirect('home');
        }
    }

    private function getAllJob($jobPost)
    {
        $result = $jobPost->findAll('job_created');
        $data['data'] = $result;
        return  $data;
    }
}
