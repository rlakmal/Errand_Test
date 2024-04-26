<?php

class WorkersList2 extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $worker = new WorkerEmployer();
        $username = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;

        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {

            $data["data"] = $worker->findAll("emp_id");

            $this->view('admin/workers3', $data);
        } else {
            redirect('home');
        }
    }

    public function chat_data($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'admin') {
            try {
                $worker = new WorkerServices();
                $chatData = new ChatData();
                $chat = new Chat();
                $toId = $_POST['to_id'];
                $fromId = $_SESSION['USER']->id;
                $userarr['from_id'] = $fromId;
                $userarr['to_id'] = $toId;
                $chatId = $chat->where($userarr, 'chat_id');

                $array['emp_id'] = $toId;
                $empData = $worker->first($array);


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

                echo json_encode($chatAllData);
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else if (($username != 'User' && $_SESSION['USER']->status == 'worker')) {
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
                $chatAllData['empImage'] = $empData->profile_image;

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
        if ($username != 'User' && $_SESSION['USER']->status == 'admin' || $_SESSION['USER']->status == 'worker') {

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
