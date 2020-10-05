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
	<?php
     
   $req=obtenirReqEtablissements();
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
				?>
				<tr>
					
					<td><?php echo $donnees['nom'];?></td>
					<td>
					<form action="listeEtablissements_details.php" method="post">
						<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
						<input type="hidden" name="nom" value="<?php echo $donnees['nom'];?>">
						<input type="submit" name="envoi" value="Voir détail" />
					</form>
					</td>
					<td></td>
					<td>
					<form action="traitement_modFormLig.php" method="post">
						<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
						<input type="submit" name="envoi" value="Modifier" />
					</form>
					</td>
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