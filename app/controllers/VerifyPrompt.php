<?php

//namespace controllers;



class VerifyPrompt extends Controller
{

    public function index($a = '', $b = '', $c = '')
    {
        $user = new User();
        unset($_SESSION["USER"]);

        $qdata["id"] = $_GET["id"];
        $data["data"] = $user->first($qdata);
        $this->view("verifyprompt", $data);
    }
}