<?php



class Ticket
{
    use Model;

    protected $table = 'ticket';

    protected $allowedCloumns = [
        'title',
        'description',
        'archived',
        'user'

    ];
}
