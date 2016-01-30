<?php

/*  Seulement pour les tests  */
ini_set('display_errors', 1);

/*  INCLUDE  */
include_once 'Fonctions/fonctions.php';
include_once 'Classes/mimimo.php';

/*  SESSION  */
session_start ();
if (isset($_SESSION['mimimo'])==false) {


	$_SESSION['mimimo'] = getMimimoFromDB(1);

	
}	
$oMimimo = $_SESSION['mimimo'];

?>

<html>

<head>
	<title>WHOUHOU</title>
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
	        <div id="centre-bis">
		        <div id="action">
		          	<ul>
						<li><a href="Fonctions/actions.php?type=nourrir">Nourrir</a></li>
						<li><a href="Fonctions/actions.php?type=jouer">Jouer</a></li>
						<li><a href="Fonctions/actions.php?type=laver">Laver</a></li>
						<li><a href="Fonctions/actions.php?type=crottes">Ramasser les crottes</a></li>
					</ul>
				</div>
	          <div id="etat">
	          		<ul>
						<li>Age: <?php echo $oMimimo->iAge; ?></li>
						<li>Santé: <?php echo $oMimimo->iSante; ?></li>
						<li>Faim: <?php echo $oMimimo->iFaim; ?></li>
						<li>Propreté: <?php echo $oMimimo->iProprete; ?></li>
						<li>Humeur: <?php echo $oMimimo->iHumeur; ?></li>
						<li>Energie: <?php echo $oMimimo->iEnergie; ?></li>
					</ul>
	          </div>	          
	          <div id="principal">
	          	o o 
	          	</br>
	          	_
	          	</br></br>
	          	<?php
	          		echo $oMimimo->sMessage;
	          	?>
	          </div>
	        </div>
		</div>
	</div>
</body>

</html>

