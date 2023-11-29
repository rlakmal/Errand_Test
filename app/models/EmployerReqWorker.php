<?php

class EmployerReqWorker
{
    use Model;
    protected $table = 'emp_req_worker';
    protected $allowedCloumns = [
        'emp_id ',
        'title',
        'budget',
        'city',
        'description',
        'worker_id',

    ];
}
