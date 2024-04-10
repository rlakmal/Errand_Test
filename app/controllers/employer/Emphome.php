<?php

class Emphome extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {

        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {

//            try {
                $jobPost = new JobPost;
                $post = new EmpPost;
                // $results = $post->findAll('job_created');
                // show($results);
                // All posted jobs
                $data = $this->getAllJob($post);

                // Post job
                if (isset($_POST['postJob'])) {
                    show($_POST);
                    // data validation 
                    unset($_POST['postJob']);
                    $emp_id = $_SESSION['USER']->id;
                    $_POST['emp_id'] = $emp_id;
                    $job_image_name = $_FILES['job_image']['name'];
                    $job_image1_name = $_FILES['job_image1']['name'];
                    if ($job_image_name != null) {
                        $_POST['job_image'] = $this->uploadImage($_FILES['job_image']['tmp_name'], $job_image_name, '/assets/images/jobimages/');
                    }
                    if ($job_image1_name != null) {
                        $_POST['job_image1'] = $this->uploadImage($_FILES['job_image1']['tmp_name'], $job_image1_name, '/assets/images/jobimages/');
                    }
                    show($_POST);

                    $jobPost->insert($_POST);
                    redirect('employer/home');
                }
//            } catch (Exception $e) {
//                // handle the exception
//            }

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

    public function uploadImage($img, $img_name, $location)
    {
        $timestamp = time(); // Get current timestamp
        $file_info = pathinfo($img_name);
        $new_img_name = $file_info['filename'] . '_' . $timestamp . '.' . $file_info['extension'];

        $target = PUBROOT . $location . $new_img_name;

        if (move_uploaded_file($img, $target)) {
            return $new_img_name;
        } else {
            return false;
        }
    }
}
