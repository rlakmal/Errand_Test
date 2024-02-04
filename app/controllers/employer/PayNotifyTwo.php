<?php

class PayNotifyTwo extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {

        $request = new WorkeRrequestJobs();
        // echo "this is a about controller";
        if($_SESSION["USER"]->status == "employer"){
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $merchant_id         = $_POST['merchant_id'];
                $order_id            = $_POST['order_id'];
                $payhere_amount      = $_POST['payhere_amount'];
                $payhere_currency    = $_POST['payhere_currency'];
                $status_code         = $_POST['status_code'];
                $md5sig              = $_POST['md5sig'];

                $merchant_secret = 'MzU1NTkwOTc4MTE2NzA3ODYzMDI1MjA1NDQyNDkxMzQ2MTgwMDA2'; // Replace with your Merchant Secret

                $local_md5sig = strtoupper(
                    md5(
                        $merchant_id .
                        $order_id .
                        $payhere_amount .
                        $payhere_currency .
                        $status_code .
                        strtoupper(md5($merchant_secret))
                    )
                );

                if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
                    $qdata["paid"] = "paid";
                } else if(($local_md5sig === $md5sig) AND ($status_code == -2)){
                    $qdata["paid"] = "failed";

                }else if(($local_md5sig === $md5sig) AND ($status_code == 0)) {
                    $qdata["paid"] = "pending";
                }else if(($local_md5sig === $md5sig) AND ($status_code == -3)) {
                    $qdata["paid"] = "chargedback";
                }else if(($local_md5sig === $md5sig) AND ($status_code == 1)) {
                    $qdata["paid"] = "unpaid";
                }

                $request->update(intval($order_id), $qdata);


            }
        }
    }

}