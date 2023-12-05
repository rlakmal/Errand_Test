<?php


//use Model;

class TicketUser
{
    use Model;

    protected $table = 'ticket_employer';

    protected $allowedCloumns = [
        'title',
        'description',
        'archived',
        'user',
        "status",
        "ticket_id"

    ];
}
