<?php



class Ticket
{
    use Model;

    protected $table = 'ticket';

    protected $allowedCloumns = [
//        'id',
        'title',
        'description',
        'archived',
        'user'

    ];
}
