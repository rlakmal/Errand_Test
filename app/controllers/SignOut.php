<?php



class SignOut extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        unset($_SESSION["USER"]);
        redirect("home");
    }

}
