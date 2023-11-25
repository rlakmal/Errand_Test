<?php


class EmpPost
{
    use Model;

    protected $table = 'emp_post';

    protected $allowedCloumns = [
        'title',
        'job_created',
        'emp_id',
        'job_id',
        'budget',
        'city',
        'name',
    ];
}
