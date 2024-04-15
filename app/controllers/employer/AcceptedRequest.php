<?php

class AcceptedRequest extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $username  = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        if ($username != 'User' && $_SESSION['USER']->status == 'employer') {
            $accepted_jobs = new AcceptedJobs;
            $emp_id = $_SESSION['USER']->id;
            $arr['emp_id'] = $emp_id;
            $results = $accepted_jobs->where($arr);
            $data['data'] = $results;
            //show($data);
            $this->view('employer/acceptedrequest2', $data);
        }
    }

    public function paymentConfig($a = '', $b = '', $c = '')
    {
        $id = $_GET['id'];
        $amount = 1000;
        $currency = 'LKR';
        $order_id = $id;
        $merchant_id = '1226438';
        $merchant_secret = "MjQyNjQzODE1NDQwODE0MTE1OTgxNDY2MzkwNTU3MzM3OTk2OTY1OQ==";

        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        $array["amount"] = $amount;
        $array["currency"] = $currency;
        $array["order_id"] = $order_id;
        $array["merchant_id"] = $merchant_id;
        $array["hash"] = $hash;

        $jasonObj = json_encode($array);
        echo $jasonObj;
    }

    public function updatePayStatus($a = '', $b = '', $c = '')
    {
        $id = $_GET['id'];
        $accepted_jobs = new AcceptedJobs;
        $updateData = [
            'payment_stat' => 'paid',
        ];
        $accepted_jobs->update($id, $updateData, 'id');
        echo "Payment Successfull";
    }
}