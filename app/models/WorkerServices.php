<?php


class WorkerServices
{
    use Model;

    protected $table = 'workers_from_emp';

    protected $allowedCloumns = [
        'emp_id',
        'name',
        'category',
        'city',
        'worker_id',
    ];
}
