<?php
//if(!isset($_SESSION['login'])){
//	header('location: ./users/login');
//}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/custstyle.css">
	<script src="/js/jquery-3.3.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<title>File spoiler site</title>
</head>
<body>
<div class="allcont">
	<header>
		<div class="header">
			<div class="rightHeadMenu">
<!--				<label>Hi,--><?//=$_SESSION['login']?><!--</label>-->
				<form action="/Users/login" method="post">
					<button type="submit">Log out</button>
				</form>
			</div>
			<div class="choiceFile">
				<form enctype="multipart/form-data" action="index" method="POST">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
					<div class="leftline">
						<input name="userfile" type="file" value="" />
					</div>
					<div class="clear"></div>
					<div class="leftline">
						<input type="submit" value="Загрузить файл" >
					</div>
				</form>
			</div>

		</div>
		<div class="container container_head">
			<div class="row" >
				<div class="container_footer">
				</div>

				<div class="col-6">

				</div>
			</div>
		</div>
		<div class="clear"></div>
	</header>
	<main>
		<?
			//while ($link_files = mysqli_fetch_assoc($files))
		?>
		<div class="container container_main">
			<div class="row">
				<div class="col-6 col-md-3"><img class="formlogin table" src="/img/059.jpg" alt="foto" > </div>
				<div class="col-6 col-md-3"><img class=" formlogin table" src="/img/059.jpg" alt="foto" > </div>
				<div class="col-6 col-md-3"><img class=" formlogin table" src="/img/059.jpg" alt="foto" > </div>
				<div class="col-6 col-md-3"><img class=" formlogin table" src="/img/059.jpg" alt="foto" > </div>
				<div class="col-6 col-md-3"><img class=" formlogin table" src="/img/059.jpg" alt="foto" > </div>
				<div class="col-6 col-md-3"><img class=" formlogin table" src="/img/059.jpg" alt="foto" > </div>
				<div class="col-6 col-md-3"><img class=" formlogin table" src="/img/059.jpg" alt="foto" > </div>
				<div class="col-6 col-md-3"><img class=" formlogin table" src="/img/059.jpg" alt="foto" > </div>

			</div>
		</div>
	</main>
	<footer>
		<div class="container container_footer">
			<div class="row" >
				<div class="col-6">third.col-6</div>
				<div class="col-6">third.col-6</div>
			</div>
		</div>
	</footer>
</div>

</body>
</html>
