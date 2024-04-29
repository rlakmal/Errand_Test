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

		// Check if name is empty
		if (empty($data['name'])) {
			echo "<script>alert('Full Name is Required');</script>";
			$this->errors['fullname'] = "Full Name is Required";
		} else {
			// Name validation
			if (!preg_match("/^[a-zA-Z ]*$/", $data['name'])) {
				echo "<script>alert('Use only letters and spaces');</script>";
				$this->errors['fullname'] = "Use only letters and spaces";
			}
		}

		// Check if email is empty
		if (empty($data['email'])) {
			echo "<script>alert('Email is Required');</script>";
			$this->errors['email'] = "Email is Required";
		} else {
			// Email validation
			if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				echo "<script>alert('Email is not Valid');</script>";
				$this->errors['email'] = "Email is not Valid";
			}
		}

		// Check if password is empty
		if (empty($data['password'])) {
			echo "<script>alert('Password is Required');</script>";
			$this->errors['password'] = "Password is Required";
		} else {
			// Check if passwords match
			if ($data['password'] !== $data['re-password']) {
				echo "<script>alert('Passwords do not match');</script>";
				$this->errors['password'] = "Passwords do not match";
			}
		}

		// If there are no errors
		if (empty($this->errors)) {
			// Password hashing 
			$password = $data['password'];
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
			$this->errors['flag'] = true;
			$this->errors['password'] = "password is Required";
		}

		if (empty($this->errors)) {
			return true;
		} else {
			$this->errors['password1'] = $data['password'];
			$this->errors['email1'] = $data['email'];

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
