<?php
session_start();
  include("bibliotheque.php");
  include("entete.html");
  include("_gestionBase.inc.php");
  include("_controlesEtGestionErreurs.inc.php");

  $idE=$_POST['id'];
  $nomE=$_POST['nom'];

   $req=obtenirDetailEtablissement($idE);
   $resultat = $bdd->query($req); 
?>

    <section class="u-align-center u-clearfix u-grey-70 u-section-1" id="sec-0b7d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-left u-heading-font u-text u-title u-text-1" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Maison des Ligues</h1>
        <h5 class="u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Détail du <?php echo $nomE; ?></h5>
        <p class="u-text u-text-3" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Cette application web permet de gérer l'hébergement des équipes de sports durant le Festival de sports de Nancy.<br>
        Retrouvez sur cette page, les informations de l'établissement sélectionné.
        </p>
      </div>
    </section>
    
<section>
    <center>
      <a href="EtablissementsListe.php" class="u-btn u-btn-submit u-button-style">Retour</a>
    <caption><h3><?php echo $nomE;?></h3></caption>
      <table>

        

        <tr>
          <th>Adresse</th>
          <th width="5%"><!-- Espace --></th>
          <th>Responsable</th>
          <th width="5%"><!-- Espace --></th>
          <th>Téléphone</th>
          <th width="5%"><!-- Espace --></th>
          <th>Mail</th>
          <th width="5%"><!-- Espace --></th>
          <th>Type</th>
          <th width="5%"><!-- Espace --></th>
          <th>Chambres offertes</th>
        </tr>

<?php

        while ($donnees = $resultat->fetch()) 
        {
        ?>
        <tr>

          <td><?php echo $donnees['adresseRue'];?>, <?php echo $donnees['ville'];?> <?php echo $donnees['codePostal'];?></td>
          <td></td>
          <td><?php echo $donnees['civiliteResponsable'];?>
            <?php echo $donnees['prenomResponsable'];?> 
            <?php echo $donnees['nomResponsable'];?></td>
          <td></td>
          <td><?php echo $donnees['tel'];?></td>
          <td></td>
          <td><?php 
              if (!$donnees['adresseElectronique']) {
                echo "Mail indisponible.";
              }
              else
              {
                echo $donnees['adresseElectronique'];
              }
              ?>
          </td>
          <td></td>
          <td>
          <?php
            if ($donnees['type']==1)
              {
                echo "Etablissement scolaire";
              }
              else
                {
                  echo "Autre établissement";
                }
          ?>
          </td>
          <td></td>
          <td style="text-align: right;"><?php echo $donnees['nombreChambresOffertes'];?></td>
        </tr>
      <?php   
        }
      ?>
      </table>

    </center>
  </section>