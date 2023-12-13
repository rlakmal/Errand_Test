<?php

//namespace controllers;

class VerifyEmail extends Controller
{

    public function index($a = '', $b = '', $c = '')
    {
        $user = new User();
        unset($_SESSION["USER"]);

        $qdata["id"] = $_GET["id"];
        $data["data"] = $user->first($qdata);
        $qdata["verified"] = true;
        unset($qdata["id"]);
        $user->update($_GET["id"], $qdata);
        $this->view("emailverify", $data);
    }
}