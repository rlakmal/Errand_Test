<?php


namespace models;
use Model;

class Note
{
    use Model;

    protected $table = 'note';

    protected $allowedCloumns = [
        'ticket',
        'body'

    ];
}
