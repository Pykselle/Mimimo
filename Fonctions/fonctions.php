<?php

ini_set('display_errors', 1);

// Constantes 
const DB_HOST = '127.0.0.1';
const DB_USER = 'root';
const DB_PASSWORD = '';


function getMimimoFromDB($iID) 
    {
	    if (!$link = mysql_connect(constant("DB_HOST"), constant("DB_USER"), constant("DB_PASSWORD"))) {
	    echo 'Connexion impossible à mysql';
	    	exit;
		}
		$db_selected = mysql_select_db('mimimo', $link);
		$sQuery="SELECT * FROM MIMIMO WHERE ID=".$iID.";";
		$aResult = mysql_query ($sQuery, $link); 

		$aRow = mysql_fetch_assoc($aResult);
		return new Mimimo($iID, $aRow['NOM'],$aRow['AGE'],$aRow['SANTE'],$aRow['FAIM'],$aRow['HUMEUR'],$aRow['PROPRETE'],$aRow['ENERGIE'],$aRow['ETAT']);
		mysql_close($link);
    }

function updateMimimoInDB($iID,$sField,$mValue) 
    {
	    if (!$link = mysql_connect(constant("DB_HOST"), constant("DB_USER"), constant("DB_PASSWORD"))) {
	    echo 'Connexion impossible à mysql';
	    	exit;
		}
		$db_selected = mysql_select_db('mimimo', $link);
		$sQuery = "UPDATE MIMIMO SET ".$sField."=\"".$mValue."\" WHERE ID=".$iID.";";
		$aResult = mysql_query ($sQuery, $link); 
		if (!$aResult) {
		    $sError  = 'Requête invalide : ' . mysql_error() . "\n";
		    $sError .= 'Requête complète : ' . $sQuery;
		    die($sError);
		}

		mysql_close($link);
    }

function getMimimoIDFromUser($sLogin,$sPassword) 
    {
	    if (!$link = mysql_connect(constant("DB_HOST"), constant("DB_USER"), constant("DB_PASSWORD"))) {
	    echo 'Connexion impossible à mysql';
	    	exit;
		}
		$db_selected = mysql_select_db('mimimo', $link);
		$sQuery = "SELECT MIMIMO_ID FROM USER WHERE LOGIN='".$sLogin."' AND PASSWORD='".$sPassword."';";
		$aResult = mysql_query ($sQuery, $link); 
		if (!$aResult) {
		    $sError  = 'Requête invalide : ' . mysql_error() . "\n";
		    $sError .= 'Requête complète : ' . $sQuery;
		    die($sError);
		}

		$aRow = mysql_fetch_assoc($aResult);
		mysql_close($link);

		if (empty($aRow)){
			die('Login/Password incorrect');
		}
		$iMimimoID=$aRow['MIMIMO_ID'];

		return $iMimimoID;
    }

?>