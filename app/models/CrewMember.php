<?php


class CrewMember
{
    use Model;

    protected $table = 'member';

    protected $allowedCloumns = [
        'name',
        'email',
        'password',
        'status',
        'emp_id',

    ];
}
