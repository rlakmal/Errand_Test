<?php


class JobPost
{
	use Model;

	protected $table = 'job';

	protected $allowedCloumns = [
		'jobTitle',
		'description',
		'address',
		'created',
		'emp_id',
		'budget',
		'city',
		'job_image',
		'job_image1'
	];
}
