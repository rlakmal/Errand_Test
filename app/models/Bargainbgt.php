<?php


class Bargainbgt
{
    use Model;

    protected $table = 'bargain_bgt';

    protected $allowedCloumns = [
        'id',
        'emp_id',
        'worker_id',
        'title',
        'newbudget',
        'budget',

    ];
}
