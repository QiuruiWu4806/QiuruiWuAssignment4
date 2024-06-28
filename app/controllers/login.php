<?php

class Login extends Controller {

    public function index() {		
	    $this->view('login/index');
    }
    
    public function verify(){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
		
			$user = $this->model('User');
			$user->authenticate($username, $password); 
    }

	public function create_account(){
			$username = $_REQUEST['username']; 
			$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT); // Hash the password

			$db = db_connect();
			$statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
		// Insert the username and hashed password
			$statement->bindValue(':username', $username);
			$statement->bindValue(':password', $password);
			$statement->execute();
			header('Location: /login');
	}
}
