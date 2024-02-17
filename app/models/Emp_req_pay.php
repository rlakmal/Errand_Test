<?php


class Emp_req_pay
{
	use Model;

	protected $table = 'emp_req_pay';

	protected $allowedCloumns = [
	    'req_id',
        'title',
        'created',
        'emp_id',
        'worker_id',
        'amount'
	];


}
