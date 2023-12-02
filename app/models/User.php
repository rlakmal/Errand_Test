<?php


class User
{
	use Model;

	protected $table = 'employer';

	protected $allowedCloumns = [
		'name',
		'email',
		'nic',
		'dob',
		'city',
		'address',
		'password',
		'status',
		'is_active',
		'profile_image',
	];

	public function validate($data)
	{
		$this->errors = [];

		// is empty name 
		if (empty($data['name'])) {
			// flag mean erros include
			$this->errors['flag'] = true;
			$this->errors['fullname'] = "Full Name is Required";
		}
		// name validation
		if (!preg_match("/^[a-zA-Z ]*$/", $data['name'])) {
			$this->errors['flag'] = true;
			$this->errors['fullname'] = array('nameError' => "Use only letters and spaces", "name" => "Full Name is not valid");
			// $this->errors[] = ;
		}

		// is empty email 
		if (empty($data['email'])) {
			$this->errors['flag'] = true;
			$this->errors['email'] = "Email is Required";
		}
		// email validation
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['flag'] = true;
			$this->errors['email'] = "Email is not Valid";
		}

		// is empty password 
		if (empty($data['password'])) {
			// $this->errors['flag'] = true;
			$this->errors['password'] = array("err" => "password is Required", "flag" => true);
		}
		// password validation
		if (!$data['password'] === $data['re-password']) {
			$this->errors['flag'] = true;
			$this->errors['password'] = "password is not same";
		}
		// else if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[!@#\$&*~]).{8,}$/", $data['password'])) {
		// 	$this->errors['flag'] = true;
		// 	$this->errors['password'] = "password is not Valid";
		// 	$this->errors['passwordError'] = "Contain [a-z/A-Z/0-9/!@#\$&*~]";
		// }


		// show($this->errors);
		if (empty($this->errors)) {

			// password hashing 
			$password = $_POST['password'];
			$hash = password_hash($password, PASSWORD_BCRYPT);
			$_POST['password'] = $hash;
			return true;
		} else {
			return false;
		}
	}


	public function formData($data)
	{
		$this->errors = [];

		// show($data);
		// is empty email 
		if (empty($data['email'])) {

			$errors['flag'] = true;
			$errors['email'] = "Email is Required";
		}

		// email validation
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['flag'] = true;
			$errors['email'] = "Email is not Valid";
		}

		// is empty password 
		if (empty($data['password'])) {
			$errors['flag'] = true;
			$errors['password'] = "password is Required";
		}

		if (empty($errors)) {
			return true;
		} else {
			$errors['password1'] = $data['password'];
			$errors['email1'] = $data['email'];

			return false;
		}
	}
	public function getLastInsertId()
	{
		$string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
		$con = new PDO($string, DBUSER, DBPASS);
		return $con->lastInsertId();
	}
}
