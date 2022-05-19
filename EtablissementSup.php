<?php
session_start();
	include("bibliotheque.php");
	include("entete.html");
	include("_gestionBase.inc.php");
	include("_controlesEtGestionErreurs.inc.php");


$id=$_REQUEST['id'];

$req=obtenirDetailEtablissement($id);
$res=$bdd->query($req);
$donnees=$res->fetch();

$nom=$donnees['nom'];

?>

    <section class="u-align-center u-clearfix u-grey-70 u-section-1" id="sec-0b7d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-left u-heading-font u-text u-title u-text-1" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Maison des Ligues</h1>
        <h5 class="u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Suppression établissement</h5>
        <p class="u-text u-text-3" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Cette application web permet de gérer l'hébergement des équipes de sports durant le Festival de sports de Nancy.
        </p>
      </div>
    </section>
    
<section>
<?php

if ($_REQUEST['action']=='demanderSupprEtab')    
{
   echo "
   <br><center><h5>Souhaitez-vous vraiment supprimer l'établissement $nom ? 
   <br><br>
   <a href='EtablissementSup.php?action=validerSupprEtab&amp;id=$id'>
   Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='EtablissementsListe.php'>Non</a></h5></center>";
}

// Cas 2ème étape (on vient de suppressionEtablissement.php)

else
{
   $req=supprimerEtablissement($id);
   $resultat=$bdd->exec($req);
   if (!$resultat) 
   {
     echo "<br><br><center><h5>Suppression échouée.</h5><a href='EtablissementsListe.php'>Retour</a></center>";
   }
   else
   {
    echo "<br><br><center><h5>L'établissement $nom a été supprimé</h5><a href='EtablissementsListe.php?'>Retour</a></center>";
   }
   
}

  include('footer.html');

?>