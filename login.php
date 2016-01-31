<?php

/*  INCLUDE  */
include_once 'Fonctions/fonctions.php';
include_once 'Classes/mimimo.php';

if (isset($_POST['login']) && isset($_POST['password'])) {
	$sLogin = $_POST['login'];
	$sPassword = $_POST['password'];
	$iMimimoID = getMimimoIDFromUser($sLogin, $sPassword);

	/*  SESSION  */
	session_start ();
	$_SESSION['mimimo'] = getMimimoFromDB($iMimimoID);
	header('Location: index.php');	
}
?>

<html>
	<head>
		<title>LOGIN</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="CSS/styles.css" />
		<link rel="stylesheet" type="text/css" href="CSS/modele.css" />
		<script type="text/javascript" src="JS/script.js"></script>
	</head>
	<body>
		<div id="global">
			<div id="entete">
				<h1>Mimimo</h1>
			</div>
			<div id="centre">
				<div id="principal">
					<form action="login.php" method="post">
						<table>
							<tr>
								<td>Login : </td>
								<td><input type="text" name="login"></td>
							</tr>
							<tr>
								<td>Password : </td>
								<td><input type="password" name="password"></td>
							</tr>
							<tr>
								<td colspan=2 align="center"><input type="submit" value="Submit"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>