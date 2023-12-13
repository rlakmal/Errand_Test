<?php



class TicketNote
{
    use Model;

    protected $table = 'ticket_note';

    protected $allowedCloumns = [
        "title",
        "description",
        "note_body",
        "archived",
        "note_id",
        "ticket_id",
        "created"

    ];
}
