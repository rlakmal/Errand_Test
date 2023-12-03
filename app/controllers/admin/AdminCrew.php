<?php

class AdminCrew extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username = isset($_SESSION['USER']) ? $_SESSION['USER']->email : 'User';

        if ($username != 'User' && isset($_SESSION['USER']->status) && $_SESSION['USER']->status == 'admin') {
            $member = new CrewMember;
            $user = new User;

            if (isset($_POST['memberRegister'])) {
                $this->handleUserRegistration($_POST, $user);
                $arr['email'] = $_POST['email'];
                $user_details = $user->first($arr);
                $crew_member_id = $user_details->id;
                $this->handleMemberRegistration($_POST, $member, $crew_member_id);
            }



            $result = $member->findAll('id');
            $data['data'] = $result;
            if (!empty($data['data'])) {
                $this->unsetFields($data['data']);
                $this->showData($data);
            }

            if (isset($_POST['member'])) {
                $this->handleMemberUpdate($member, $_POST);
            }

            if (isset($_POST['active'])) {
                $this->handleMemberDeletion($member, $_POST);
            }

            $this->view('admin/admincrew', $data);
        } else {
            redirect('home');
        }
    }

    private function handleMemberRegistration($postData, $member, $crew_member_id)
    {
        unset($postData['memberRegister']);
        $postData['status'] = 'crew_member';
        $postData['active'] = 1;
        $postData['emp_id'] = $crew_member_id;
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $postData['password'] = $hash;
        $member->insert($postData);
        redirect('admin/admincrew');
    }

    private function handleUserRegistration($postData, $user)
    {

        unset($postData['memberRegister']);
        unset($postData['active']);
        $postData['status'] = 'crew_member';
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $postData['password'] = $hash;
        $user->insert($postData);
    }

    private function unsetFields(&$data)
    {
        foreach ($data as $item) {
            unset($item->password);
            unset($item->created);
            unset($item->status);
            unset($item->emp_id);
        }
    }

    private function showData($data)
    {
        extract($data);
    }

    private function handleMemberUpdate($member, $postData)
    {
        unset($postData['member']);
        unset($postData['emp_id']);
        $id = $postData['id'];
        unset($postData['id']);
        $this->updateDetails($member, $id, $postData);
    }

    private function handleMemberDeletion($member, $postData)
    {
        unset($postData['active']);
        $member->delete($postData['id'], 'id');
        redirect('admin/admincrew');
    }

    private function updateDetails($member, $user_id, $data)
    {
        $member->update($user_id, $data, 'id');
        redirect('admin/admincrew');
    }
}
