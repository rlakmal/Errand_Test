<?php


class JobNotify
{
    use Model;

    protected $table = 'job_notifications';

    protected $allowedCloumns = [
        'n_id ',
        'emp_id',
        'notification_name',
        'message',
        'active',

    ];
}
