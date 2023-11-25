<?php


class CrewMember
{
    use Model;

    protected $table = 'member';

    protected $allowedCloumns = [
        'name',
        'username',
        'password',
        'status'

    ];
}
