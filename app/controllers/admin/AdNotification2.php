<?php

class adNotification2 extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {


            $notification = new Notification;

            if (isset($_POST['announcement'])) {

                unset($_POST['announcement']);

//                $_POST['status'] = 'crew_member';
//                $_POST['active'] = 1;
//
//                $password = $_POST['password'];
//                $hash = password_hash($password, PASSWORD_BCRYPT);
//                $_POST['password'] = $hash;
                
                

                // show($_POST);
                $notification->insert($_POST);
                redirect('admin/adnotification2');
            }

            $result = $notification->findAll('id');

            $data['data'] = $result;
            if (!empty($data)) {
                extract($data);
                // show($data);
            }
            if (!empty($data)) {


                foreach ($data as $item) {

                    unset($item->title);
                    unset($item->body);
                    unset($item->worker);
                    unset($item->employer);
                    unset($item->created);
                    //  show($item->password);
                }
            }

            if (isset($_POST['member'])) {
                unset($_POST['member']);
                $id = $_POST['id'];

                unset($_POST['id']);
                $this->Updatedetails($notification, $id, $_POST);
            }
            
            if (isset($_POST['active'])) {
                unset($_POST['active']);
                // show($_POST);
                $notification->delete($_POST['id'],'id');
                redirect('admin/adnotification2');
            }

            
            $this->view('admin/adnotification2', $data);
        } else {
            redirect('home');
        }
    }
    // update member data
    private function Updatedetails($notification, $use_id, $data)
    {
        $notification->update($use_id, $data, 'id');
        redirect('admin/adnotification2');
    }
}
