<?php
session_start();
	include("bibliotheque.php");
	include("entete.html");
	include("_gestionBase.inc.php");
	include("_controlesEtGestionErreurs.inc.php");
?>

    <section class="u-align-center u-clearfix u-grey-70 u-section-1" id="sec-0b7d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-left u-heading-font u-text u-title u-text-1" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Maison des Ligues</h1>
        <h5 class="u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Les Établissements</h5>
      </div>
    </section>
    
<section>
  <a href="?????????" target="_blank">Effectuer ou modifier les attributions</a>
  </section>
<?php
     
   $req=AttributionsGroupe();
   $resultat = $bdd->query($req);
  ?>

    <center>
    <caption><h3>Listes des Établissements</h3></caption>
      <table>

        

        <tr>
          <th><!-- Nom --></th>
          <th width="20%"><!-- Espace --></th>
          <th><!-- Voir détails --></th>
          <th width="10px"><!-- Espace --></th>
          <th><!-- Modifier --></th>
          <th><!-- Supprimer --></th>
        </tr>
<?php

        while ($donnees = $resultat->fetch()) 
        {
          $dispo = $donnees['nombreChambresOffertes'] - $donnees['nombreChambres']
        ?>
        <tr>
          <td><?php echo $donnees['nom'];?> (Offre : <?php echo $donnees['nombreChambresOffertes'];?> Disponibilités : <?php echo $dispo;?>)</td>
        </tr>
        <tr>
          <td>Nom groupe</td>
          <td>Chambre attribuées</td>
        </tr> 
          <td><?php echo $donnees['Enom'];?></td>
          <td><?php echo $donnees['nombreChambres'];?></td>
        </tr>

      <?php   
        }
      ?>

      </table>
    </center>
</section>
    
    <section class="u-backlink u-clearfix u-grey-80">
      <p class="u-text">
        <span>&copy;2020 Maison des Ligues - BTS SIO2</span>
      </p>. 
    </section>
  </body>
</html>