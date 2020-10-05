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
		<caption><h3>Listes des Équipes</h3></caption>
			<table>

				<?php

				while ($donnees = $resultat->fetch()) 
				{
				?>

				<dl>
					<dt>Nom de l'établissement</dt>
					<dd><?php echo $donnees['nom'];?></dd>
					
					<dt></dt>
					<dd>
					<form action="traitement_modFormLig.php" method="post">
						<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
						<input type="submit" name="envoi" value="Modifier" />
					</form>
					</dd>

				</dl>
				<hr />
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