<?php

class EmployerReqWorker
{
    use Model;
    protected $table = 'emp_req_worker';
    protected $allowedCloumns = [
        'emp_id ',
        'emp_name',
        'title',
        'budget',
        'city',
        'description',
        'worker_id',
        'worker_name',

    ];
}
