<?php 

	require_once('controllers/interfaces/register_interface.php');

	class RegisterController implements RegisterInterface{
		public function index(){
			require_once('views/register/index.php');
		}

		public function checkEmail(){
			if (!isset($_POST['email']) || $_POST['email'] == ""){
				$_SESSION['errMsg']="Email can't be empty";
				die(require_once('views/register/index.php'));
			}
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$_SESSION['errMsg']="Invalid email";
				die(require_once('views/register/index.php'));
			}
			$user = User::find($_POST['email']);
			if(!empty(array_filter($user))){
				$_SESSION['errMsg']="Email already exists!";
				die(require_once('views/register/index.php'));
			}

		}

		public function checkRePassword(){
			if (!isset($_POST['password']) || !isset($_POST['repassword']) || $_POST['password'] == ""){
				$_SESSION['errMsg']="Password can't be empty";
				die(require_once('views/register/index.php'));
			}
			if ($_POST['password'] !== $_POST['repassword']){
				$_SESSION['errMsg']="Re-password does not match";
				die(require_once('views/register/index.php'));
			}
		}

		public function checkName(){
			if (!isset($_POST['name']) || $_POST['name'] == ""){
				$_SESSION['errMsg']="Name can't be empty";
				die(require_once('views/register/index.php'));
			}
			if (strlen($_POST['name']) < 6 || strlen($_POST['name']) > 20){
				$_SESSION['errMsg']="Name must be between 6 and 20 characters";
				die(require_once('views/register/index.php'));
			}
		}

		public function checkTelephone(){
			if (!isset($_POST['telephone']) || $_POST['telephone'] == ""){
				$_SESSION['errMsg']="Telephone number can't be empty";
				die(require_once('views/register/index.php'));
			}
			if (!ctype_digit($_POST['telephone'])){
				$_SESSION['errMsg']="Invalid telephone number";
				die(require_once('views/register/index.php'));
			}
		}

		public function checkGender(){
			if (!isset($_POST['gender']) || $_POST['gender'] == ""){
				$_SESSION['errMsg']="Gender can't be empty";
				die(require_once('views/register/index.php'));
			}
		}

		public function register(){
			$this->checkEmail();
			$this->checkRePassword();
			$this->checkName();
			$this->checkTelephone();
			$this->checkGender();
			if(!User::insert($_POST['email'],$_POST['password'],$_POST['name'],$_POST['telephone'], $_POST['gender'])){
				$_SESSION['errMsg']="Can't add user";
				die(require_once('views/register/index.php'));
			}
			$_SESSION['errMsg']="User added successfully";
			die(require_once('views/register/index.php'));
		}
	}
 ?>