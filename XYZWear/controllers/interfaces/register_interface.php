<?php

interface RegisterInterface{
	public function index();
	public function checkEmail();
	public function checkRePassword();
	public function checkName();
	public function checkTelephone();
	public function checkGender();
	public function register();
}

?>