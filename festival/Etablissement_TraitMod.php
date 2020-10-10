<?php
session_start();
	include("bibliotheque.php");
	include("entete.html");
	include("_gestionBase.inc.php");
	include("_controlesEtGestionErreurs.inc.php");

  $id=$_POST['id'];
  $nom=$_POST['nom'];
  $adresse=$_POST['adresse'];
  $cp=$_POST['cp'];
  $ville=$_POST['ville'];
  $email=$_POST['email'];
  $tel=$_POST['tel'];
  $civil=$_POST['civil'];
  $nomR=$_POST['nomR'];
  $prenomR=$_POST['prenomR'];
  $chambre=$_POST['chambre'];
  $type=$_POST['type'];

/*
  echo $id;
  echo $nom;
  echo $adresse;
  echo $cp;
  echo $ville;
  echo $email;
  echo $tel;
  echo $civil;
  echo $nomR;
  echo $prenomR;
  echo $chambre;
  echo $type;
*/

?>
  <link rel="stylesheet" type="text/css" href="formulaire.css">
    <section class="u-align-center u-clearfix u-grey-70 u-section-1" id="sec-0b7d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-left u-heading-font u-text u-title u-text-1" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Maison des Ligues</h1>
        <h5 class="u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Modification d'établissement</h5>
        <p class="u-text u-text-3" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Cette application web permet de gérer l'hébergement des équipes de sports durant le Festival de sports de Nancy.<br>
        </p>
      </div>
    </section>
<?php

$req=modifierEtablissement($id, $nom, $adresse, $cp, 
                               $ville, $tel, $email, $type, 
                               $civil, $nomR, $prenomR, $chambre);

$res=$bdd->exec($req);
  if (!$res) 
  {
    echo "<br><center><h5>Modification échouée.</h5><a href='EtablissementsListe.php'>Retour</a></center>.";
  }
  else
  {
    echo "<br><center><h5>Modification réussie.</h5><a href='EtablissementsListe.php'>Retour</a></center>.";
  }

?>

    <section class="u-backlink u-clearfix u-grey-80">
      <p class="u-text">
        <span>&copy;2020 Maison des Ligues - BTS SIO2</span>
      </p>. 
    </section>
  </body>
</html>