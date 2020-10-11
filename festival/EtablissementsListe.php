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
        <p class="u-text u-text-3" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Cette application web permet de gérer l'hébergement des équipes de sports durant le Festival de sports de Nancy.<br>
        Retrouvez ici, l'ensemble des établissments hébergeant les équipes de sports.
        </p>
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
					<th width="10px"><!-- Espace --></th>
					<th><!-- Voir détails --></th>
					<th width="10px"><!-- Espace --></th>
					<th><!-- Modifier --></th>
					<th width="10px"><!-- Espace --></th>
					<th><!-- Supprimer --></th>
				</tr>
				<?php

				while ($donnees = $resultat->fetch()) 
				{
					$id=$donnees['id'];
				?>
				<tr>
					
					<td><?php echo $donnees['nom'];?></td>
					<td>
					<form action="EtablissementsListe_Details.php" method="post">
						<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
						<input type="hidden" name="nom" value="<?php echo $donnees['nom'];?>">
						<input type="submit" name="envoi" value="Voir détail" />
					</form>
					</td>
					<td></td>
					<td>
					<form action="EtablissementMod.php" method="post">
						<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
						<input type="submit" name="envoi" value="Modifier" />
					</form>
					</td>
					<td></td>
					<?php
						$req2=existeAttributionsEtab($id);
						$res2=$bdd->query($req2);
						if (!$ligne=$res2->fetch())
						{
					?>
					<td>
						<form action="EtablissementSup.php?action=demanderSupprEtab" method="POST">
							<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
							<input type="submit" name="envoi" value="Supprimer">
						<!-- <a href='EtablissementSup.php?action=demanderSupprEtab&amp;id=$id'>Supprimer</a></td> -->
					</form>
					</td>
					<?php
						}		
				}
			?>

			</table>
		
			<br>
				<form action="EtablissementCreate.php?action=demanderCreEtab" method="POST">
					<input type="submit" name="envoi" value="Créer un établissement" class="u-btn u-btn-submit u-button-style">
				</form>
			<br>

	</center>

</section>
    
<?php
  include('footer.html');
?>