<?php

ini_set('display_errors', 1);
include_once 'fonctions.php';
include_once '../Classes/mimimo.php';
session_start ();

if (isset($_SESSION['mimimo'])==false) 
{
	echo 'misère...';
}else{
	$oMimimo=$_SESSION['mimimo'];
	$sTypeAction=$_GET['type'];
	switch ($sTypeAction) {
	    case "nourrir":
			$oMimimo->nourrir();
			updateMimimoInDB($oMimimo->iID,"FAIM",$oMimimo->iFaim);
			updateMimimoInDB($oMimimo->iID,"MESSAGE",$oMimimo->sMessage);
	        break;
	    case "laver":
			$oMimimo->laver();
			updateMimimoInDB($oMimimo->iID,"PROPRETE",$oMimimo->iProprete);
			updateMimimoInDB($oMimimo->iID,"MESSAGE",$oMimimo->sMessage);
	        break;
	    case "jouer":
			$oMimimo->jouer();
			updateMimimoInDB($oMimimo->iID,"HUMEUR",$oMimimo->iHumeur);
			updateMimimoInDB($oMimimo->iID,"MESSAGE",$oMimimo->sMessage);
	        break;
	    default:
	    	echo "Misère...";
	}
	header('Location: ../index.php');
  	exit();

}

?>