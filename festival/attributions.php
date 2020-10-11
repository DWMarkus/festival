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
        <h5 class="u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Les Attributions</h5>
        <p class="u-text u-text-3" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Cette application web permet de gérer l'hébergement des équipes de sports durant le Festival de sports de Nancy.<br>
        Retrouvez ici, l'ensemble des attributions.
        </p>        
      </div>
    </section>
    
<?php

   $nbEtab = obtenirNbEtabOffrantChambres();

   if ($nbEtab!=FALSE)
   {
  
  ?>
    <center>
    <section>
      <caption><h3>Listes des Établissements</h3></caption>
          <form action="attributionsMod.php??action=demanderModifAttrib" method="POST">
              <input type="submit" name="envoi" class="u-btn u-btn-submit u-button-style" value="Effectuer ou modifier les attributions">
          </form>
    
      <table>

        <tr>
          <th><!-- Nom Et --></th>
          <th width="20%"><!-- Espace --></th>
          <th><!-- Voir détails --></th>
          <th width="10px"><!-- Espace --></th>
          <th><!-- Modifier --></th>
          <th><!-- Supprimer --></th>
        </tr>
<?php
   $req = ObtenirReqEtablissementsAyantChambresAttribuées();
   $res = $bdd->query($req);

    while ($donnees=$res->fetch()) 
    {
      /* Execution des requetes pour récupérer le nombre de disponibilités */
        $idEtab=$donnees['id'];
        $nomEtab=$donnees['nom'];
        $nbOffre=$donnees["nombreChambresOffertes"];

        $requete=obtenirNbOccup($idEtab);

        $resultat=$bdd->query($requete);
        $donnees2=$resultat->fetch();
        $nbOccup=$donnees2['totalChambresOccup'];

        $dispo = $nbOffre - $nbOccup;
?>
       <tr>
          <td style="border-top: 2px solid black;"><strong>
            <?php echo $donnees['nom'];?></strong><em> (Offre : <?php echo $donnees['nombreChambresOffertes'];?> / Disponibles : <?php echo $dispo;?>)
          </em></td>
        </tr>

        <tr>
          <td><strong>Nom équipe (Ville)</strong></td>
          <td><strong>Chambres attribuées</strong></td>
        </tr> 
<?php
    

    $req2=obtenirReqGroupesEtab($idEtab);
    $res2=$bdd->query($req2);



        while ($ligne=$res2->fetch()) 
        {
          $idEq=$ligne['id'];
          $NomEquipe=$ligne['nom'];
        ?>

          <td><?php echo $ligne['nom'];?> (<?php echo $ligne['nomVille'];?>)</td>

      <?php

      $req3=obtenirNbOccupGroupe($idEtab, $idEq);
      $res3=$bdd->query($req3);

            while ($ligneR=$res3->fetch())
            {
              if (!$ligneR)
              { 
                echo 1;  
              }
              else
              { ?>
                  <td><?php echo $ligne['nombreChambres'];?></td>
                </tr>
                <?php
              }
            }

        }
    }
  }
      ?>

      </table>
    </center>
</section>
    
<?php
  include('footer.html');
?>