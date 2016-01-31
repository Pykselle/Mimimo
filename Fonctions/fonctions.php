<?php

ini_set('display_errors', 1);



function getMimimoFromDB($iID) 
    {
	    if (!$link = mysql_connect('127.0.0.1', 'root', '')) {
	    echo 'Connexion impossible à mysql';
	    	exit;
		}
		$db_selected = mysql_select_db('mimimo', $link);
		$sQuery="SELECT * FROM MIMIMO WHERE ID=".$iID.";";
		$aResult = mysql_query ($sQuery, $link ); 

		$aRow = mysql_fetch_assoc($aResult);
		return new Mimimo($iID, $aRow['NOM'],$aRow['AGE'],$aRow['SANTE'],$aRow['FAIM'],$aRow['HUMEUR'],$aRow['PROPRETE'],$aRow['ENERGIE'],$aRow['ETAT']);
		mysql_close($link);
    }

function updateMimimoInDB($iID,$sField,$mValue) 
    {
	    if (!$link = mysql_connect('127.0.0.1', 'root', '')) {
	    echo 'Connexion impossible à mysql';
	    	exit;
		}
		$db_selected = mysql_select_db('mimimo', $link);
		$sQuery = "UPDATE MIMIMO SET ".$sField."=\"".$mValue."\" WHERE ID=".$iID.";";
		$result = mysql_query ($sQuery, $link ); 
		if (!$result) {
		    $sError  = 'Requête invalide : ' . mysql_error() . "\n";
		    $sError .= 'Requête complète : ' . $sQuery;
		    die($sError);
		}

		mysql_close($link);
    }

?>