<?php

require_once (dirname(__FILE__) . '/fonctions.php');
require_once (dirname(__FILE__) . '/../Classes/mimimo.php');

$oMimimo = getMimimoFromDB(1);
$oMimimo->maj();

updateMimimoInDB($oMimimo->iID,"FAIM",$oMimimo->iFaim);
updateMimimoInDB($oMimimo->iID,"PROPRETE",$oMimimo->iProprete);
updateMimimoInDB($oMimimo->iID,"HUMEUR",$oMimimo->iHumeur);
updateMimimoInDB($oMimimo->iID,"MESSAGE",$oMimimo->sMessage);
updateMimimoInDB($oMimimo->iID,"ENERGIE",$oMimimo->iEnergie);
updateMimimoInDB($oMimimo->iID,"AGE",$oMimimo->iAge);
updateMimimoInDB($oMimimo->iID,"ETAT",$oMimimo->iEtat);

?>