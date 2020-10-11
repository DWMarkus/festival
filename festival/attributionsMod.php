<?php
session_start();
	include("bibliotheque.php");
	include("entete.html");
	include("_gestionBase.inc.php");
	include("_controlesEtGestionErreurs.inc.php");

$requete=obtenirNbEtabOffrantChambres();
$resultat=$bdd->query($requete);
$nbEtabOffrantChambres=$resultat->fetch();
$nb=$nbEtabOffrantChambres['nombreEtabOffrantChambres']+1;
$pourcCol=50/$nbEtabOffrantChambres['nombreEtabOffrantChambres'];

?>

    <section class="u-align-center u-clearfix u-grey-70 u-section-1" id="sec-0b7d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-left u-heading-font u-text u-title u-text-1" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Maison des Ligues</h1>
        <h5 class="u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Effectuer ou modifier des Attributions</h5>
        <p class="u-text u-text-3" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Cette application web permet de gérer l'hébergement des équipes de sports durant le Festival de sports de Nancy.<br>
        </p>        
      </div>
    </section>
    <center>
      <a href="attributions.php" class="u-btn u-btn-submit u-button-style">Retour</a>
    </center>

<?php

$action=$_REQUEST['action'];

// Si l'action est validerModifAttrib (cas où l'on vient de la page 
// donnerNbChambres.php) alors on effectue la mise à jour des attributions dans 
// la base 
if ($action=='validerModifAttrib')
{
   $idEtab=$_REQUEST['idEtab'];
   $idGroupe=$_REQUEST['idGroupe'];
   $nbChambres=$_REQUEST['nbChambres'];
   modifierAttribChamb($idEtab, $idGroupe, $nbChambres);
}

?>


<?php
  include('footer.html');
?>