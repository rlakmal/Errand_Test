<?php


class ChatData
{
    use Model;

    protected $table = 'chat_data';

    protected $allowedCloumns = [
        'chat_id',
        'user_id',
        'msg',
        'time',


    ];
}
