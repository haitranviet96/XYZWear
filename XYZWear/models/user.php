<?php 
	class User{
		private $email;
		private $password;
		private $name;
		private $telephone;
		private $gender;

		public function __construct($email, $password, $name, $telephone, $gender) {
	      $this->email = $email;
	      $this->password = $password;
	      $this->name = $name;
	      $this->telephone = $telephone;
	      $this->gender = $gender;
	  }

	  	public static function find($email) {
	      $db = Db::getInstance();
	      $req = $db->prepare('SELECT * FROM user WHERE email = :email');
	      $req->execute(array('email' => $email));
	      $email = $req->fetchAll();
	      return $email;
   	 }

   	 	public static function insert($email, $password, $name, $telephone, $gender){
   		  $db = Db::getInstance();
	      $req = $db->prepare('INSERT INTO user VALUES(:email,:password,:name,:telephone,:gender)');
	      return $req->execute(array('email' => $email,'password' => md5($password), 'name' => $name, 'telephone' => $telephone, 'gender' => $gender));
   	 	}
    }
	

 ?>