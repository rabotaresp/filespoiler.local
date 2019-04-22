<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function login()
	{
		$this->load->library('session');
		if($_POST){
			if(isset($_POST['login_user']) && isset($_POST['pass'])){
				$login = $_POST['login_user'];
				$password = $_POST['pass'];
				$db = mysqli_connect('localhost', 'root', '', 'filedump');
				$myquery = "SELECT Login, Password FROM users WHERE login = '" . $login . "' and password = '" . $password . "'";
				$res = mysqli_query($db, $myquery);
				if (mysqli_num_rows($res) == 1) {
					$_SESSION['login'] = $login;
					$id_u = mysqli_query($db, "select id from users where login = '" . $login . "' and password = '" . $password . "'");
					$_SESSION['id'] = implode('',mysqli_fetch_assoc($id_u));
					mysqli_close($db);
					header('location: /Fileview/index');
				}
				else {
					mysqli_close($db);
					header('location: /Users/registration');
				}
			}
		}
		$this->load->view('Users/login');
	}
	public function registration()
	{
		$this->load->library('session');
		if($_POST){
			if(isset($_POST['name']) && isset($_POST['login_user']) && isset($_POST['pass'])){
				$name = $_POST['name'];
				$login = $_POST['login_user'];
				$password = $_POST['pass'];
				$db = mysqli_connect('localhost', 'root', '', 'filedump');
				$result = mysqli_query($db,'SELECT Login FROM users WHERE login = "' . $login . '"');
				if ( mysqli_num_rows($result) > 0) {
					$error = 'Your login is busy, change login.';
					header('location: /Users/registration');
				}
				else {
					$myquery = "insert into users (Name, Login, Password) value ('" . $name . "', '" . $login . "','" . $password . "')";
					$res = mysqli_query($db, $myquery);
					$_SESSION['id'] = mysqli_insert_id($db);
					$_SESSION['login'] = $login;
				}
				if(mysqli_errno($db)== 0)
				{
					$error = 'Success login';
					mysqli_close($db);
					header('location: /Fileview/index');
				}
			}
		}
		$this->load->view('Users/registration');
	}
}
