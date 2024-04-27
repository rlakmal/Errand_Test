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
                $udata = $_POST;
                unset($udata["member"]);
                $id = $udata["emp_id"];
                unset($udata["id"]);
                unset($udata["emp_id"]);


                if(trim($udata["password"]) != ""){

                    $udata["password"] = password_hash($udata["password"], PASSWORD_BCRYPT);

                } else {
                    unset($udata["password"]);
                }


                $user->update($id,$udata);

                $this->handleMemberUpdate($member, $_POST);
            }

            if (isset($_POST['active'])) {
                $this->handleMemberDeletion($member,$user, $_POST);
            }

            $this->view('admin/admincrew', $data);
        } else {
            redirect('home');
        }
    }

    private function handleMemberRegistration($postData, $member, $crew_member_id)
    {
        unset($postData['memberRegister']);
        $postData['status'] = 'member';
        $postData['active'] = 1;
        $postData['emp_id'] = $crew_member_id;
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $postData['password'] = $hash;
        $postData['profile_image'] = 'prof.png';


        $member->insert($postData);
        redirect('admin/admincrew');
    }

    private function handleUserRegistration($postData, $user)
    {

        $qdata["email"] = $postData["email"];
        $exists = $user->first($qdata);
        if($exists){
            redirect('admin/admincrew');
        }

        unset($postData['memberRegister']);
        unset($postData['active']);
        $postData['status'] = 'member';
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $postData['password'] = $hash;
        $postData['profile_image'] = 'prof.png';

        $user->insert($postData);

    }

    private function unsetFields(&$data)
    {
        foreach ($data as $item) {
            unset($item->password);
            unset($item->created);
            unset($item->status);
//            unset($item->emp_id);
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
        if(trim($postData["password"]) != ""){

            $postData["password"] = password_hash($postData["password"], PASSWORD_BCRYPT);

        } else {
            unset($postData["password"]);
        }
        $this->updateDetails($member, $id, $postData);
    }

    private function handleMemberDeletion($member,$user, $postData)
    {
        unset($postData['active']);
        $member->delete($postData['id'], 'id');
        $user->delete($postData["emp_id"], 'id');
        redirect('admin/admincrew');
    }

    private function updateDetails($member, $user_id, $data)
    {
//        $emp_id = $data["emp_id"];
//        unset($data["emp_id"]);
//
//        $user->update($emp_id, $data);

        $member->update($user_id, $data, 'id');
        redirect('admin/admincrew');
    }

    public function chat_data($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {
            try {
                $member = new CrewMember();
                $chatData = new ChatData();
                $chat = new Chat();
                $toId = $_POST['to_id'];
                $fromId = $_SESSION['USER']->id;
                $userarr['from_id'] = $fromId;
                $userarr['to_id'] = $toId;
                $chatId = $chat->where($userarr, 'chat_id');

                $array['emp_id'] = $toId;
                $empData = $member->first($array);


                if ((empty($chatId))) {

                    // insert the chat conversation
                    $arr = [];
                    $arr['from_id'] = $fromId;
                    $arr['to_id'] = $toId;

                    $chat->insert($arr);

                    // Again check session user chat conversation & get the ID
                    $chatId = $chat->where($arr);
                }
                $chatMsgs = $this->chatbox($chatId[0]->chat_id);

                $chatAllData['chat'] = $chatId;
                $chatAllData['chatMsgs'] = $chatMsgs;
                $chatAllData['log_user'] = $fromId;
                $chatAllData['empImage'] = $empData->profile_image;
                $chatAllData['name'] = $empData->name;

                echo json_encode($chatAllData);
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else if (($username != 'User' && $_SESSION['USER']->status == 'member')) {
            try {

                $emp = new User();
                $chatData = new ChatData();
                $chat = new Chat();
                $fromId = $_POST['to_id'];
                $toId = $_SESSION['USER']->id;
                $userarr['from_id'] = $fromId;
                $userarr['to_id'] = $toId;
                $chatId = $chat->where($userarr, 'chat_id');
                $array['id'] = $fromId;
                $empData = $emp->first($array);

                if ((empty($chatId))) {

                    // insert the chat conversation
                    $arr = [];
                    $arr['from_id'] = $fromId;
                    $arr['to_id'] = $toId;

                    $chat->insert($arr);

                    // Again check session user chat conversation & get the ID
                    $chatId = $chat->where($arr);
                }
                $chatMsgs = $this->chatbox($chatId[0]->chat_id);

                $chatAllData['chat'] = $chatId;
                $chatAllData['chatMsgs'] = $chatMsgs;
                $chatAllData['log_user'] = $toId;
//                $chatAllData['empImage'] = $empData->profile_image;

                echo json_encode($chatAllData);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
    private function chatbox($chat_id)
    {
        $arr['chat_id'] = $chat_id;

        $chatData = new ChatData();
        $chatMsg = $chatData->where($arr, 'chat_id');

        return $chatMsg;
    }
    public function save_data($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'member' || $_SESSION['USER']->status == 'admin') {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $chatData = new ChatData();
                $chatData->insert($_POST);
            } else {

                redirect("404");
            }
        } else {
            redirect("404");
        }
    }
}
