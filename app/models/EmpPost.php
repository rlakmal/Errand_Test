<?php


class EmpPost
{
    use Model;

    protected $table = 'emp_post';

    protected $allowedCloumns = [
        'title',
        'job_created',
        'emp_id',
        'id',
        'budget',
        'description',
        'profile_image',
        'city',
        'address',
        'name',
    ];
}
