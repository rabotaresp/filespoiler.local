<?php
//if($_POST){
//	if(isset($_POST['name']) && isset($_POST['login_user']) && isset($_POST['pass'])){
//		$name = $_POST['name'];
//		$login = $_POST['login_user'];
//		$password = $_POST['pass'];
//		$db = mysqli_connect('localhost', 'root', '', 'filedump');
//		$result = mysqli_query($db,'SELECT Login FROM users WHERE login = "' . $login . '"');
//		if ( mysqli_num_rows($result) > 0) {
//			$error = 'Your login is busy, change login.';
//			header('location: registration');
//		}
//		else {
//			$myquery = "insert into users (Name, Login, Password) value ('" . $name . "', '" . $login . "','" . $password . "')";
//			$res = mysqli_query($db, $myquery);
//			$_SESSION['id'] = mysqli_insert_id($db);
//			$_SESSION['login'] = $login;
//		}
//		if(mysqli_errno($db)== 0)
//		{
//			$error = 'Success login';
//			mysqli_close($db);
//			header('location: /Fileview/index');
//		}
//	}
//}
?>
<div >
	<form action="registration" method="post">
		<label class="regform">* enter your name</label>
		<input type="text" name="name" class="regform">
		<label class="regform" >* enter your login</label>
		<input type="text" name="login_user" class="regform">
		<label class="regform">* enter password</label>
		<input type="text" name="pass" class="regform">
		<button type="submit" id="registr" class="regform">Registration</button>
	</form>
</div>
