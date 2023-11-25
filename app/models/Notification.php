<?php

class Notification
{
    use Model;

    protected $table = 'notification';

    protected $allowedCloumns = [
        'title',
        'body',
        'employer',
        'worker'

    ];
}