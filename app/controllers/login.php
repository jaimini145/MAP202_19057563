<?php

class Login extends Controller {

    public function index() {	
	    $this->view('login/index');
		die;
    }

    
public function verify(){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
	
		$user = $this->model('User');
        if(!empty($username) && !empty($password) && !is_numeric($username))
		{
		$user->authenticate($username, $password);
		die;
		}
		else {
		$message =" Please Enter text ";
		}
		$this->view('login/index', ['message' => $message]);
		}


}
