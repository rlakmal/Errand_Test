<?php


class Ratings
{
    use Model;

    protected $table = 'ratings';

    protected $allowedCloumns = [
        'id',
        'emp_id',
        'worker_id',
        'rating_data',
        'user_name',
        'user_review',


    ];
}
