<?php


class ContactUs
{
    use Model;

    protected $table = 'contact_us';

    protected $allowedCloumns = [
        'id',
        'name',
        'phone_number',
        'email',
        'message'

    ];
}
