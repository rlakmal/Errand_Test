<?php


class AcceptedJobs
{
    use Model;

    protected $table = 'accepted_jobs ';

    protected $allowedCloumns = [
        'id',
        'emp_id',
        'worker_id',
        'title',
        'worker_name',
        'budget',
        'payment_stat',

    ];
}
