<?php 
session_start();
require_once('Class/autoload.php');
require_once('Class/Connexion.class.php');
include_once('requete/rqtListe.php');

if(is_null($_SESSION['ID']))
{header('Location: index.php');}

$pageReservation = new page_base('Consultations');


if ($_SESSION['IdProfil']==NULL)
{ 
	$pageReserver->corps .= '

		<div id=bouton class="panel-white">
			<div class="panel-heading">
    			<h3 id="titre0" class="panel-title">Recherche</h3>
    		</div>
		<div class="panel-body">
				
				 <div id="choix" style="text-align:center;">
                   <button id="afficheEtab" class="btn btn-info btn-rounded" 
				  	onClick="affiche_Etab()">Je cherche un établissement</button></br></br>
				   <button id="afficheForm" class="btn btn-info btn-rounded" 
				   	onClick="affiche_Form()">Je cherche une formation</button>
				</div>
		</div>
		</div>
				';

}  
 

$pageReservation->afficher();
?>