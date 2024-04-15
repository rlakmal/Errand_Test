<?php


class Worker
{
	use Model;

	protected $table = 'worker';

	protected $allowedCloumns = [
		'category',
		'gender',
		'worker_id',
		'created',
		'name',
		'city',
		'email',
        "verified",
		"address",
		"dob",
		"skills",
		"expierience",
		"profile_image",
		"certificate_image",
		"status",
		


	];
}
