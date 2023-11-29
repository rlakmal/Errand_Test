<?php


namespace models;

use Model;

class TicketNote
{
    use Model;

    protected $table = 'ticketnote';

    protected $allowedCloumns = [
        "title",
        "description",
        "note_body",
        "archived"

    ];
}
