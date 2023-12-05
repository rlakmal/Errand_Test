<?php




class Note
{
    use Model;

    protected $table = 'note';

    protected $allowedCloumns = [
        'ticket_no',
        'body'

    ];
}
