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
        <h5 class="u-text u-text-2" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Création Établissement</h5>
        <p class="u-text u-text-3" data-animation-name="slideIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Cette application web permet de gérer l'hébergement des équipes de sports durant le Festival de sports de Nancy.<br>
        </p>
      </div>
    </section>
    
    <section>
      <center>
      <a href="EtablissementsListe.php" class="u-btn u-btn-submit u-button-style">Retour</a>
      <caption><h3>Formulaire de création d'établissement</h3></caption>
      </center>
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-form u-form-1">
          <form action="Etablissement_TraitCreate.php" method="POST" style="padding: 10px" source="custom" name="form">

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Code Postal :</strong></label>
              <input type="text" placeholder="0000000X" id="id" name="id" minlength="8" maxlength="8" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-form-group u-form-name u-form-group-1">
              <label class="u-label"><strong>Nom de l'établissement :</strong></label>
              <input type="text" placeholder="Collège Exemple" id="nom" name="nom" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Adresse :</strong></label>
              <input type="text" placeholder="X rue exemple" id="adresse" name="adresse" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Code Postal :</strong></label>
              <input type="number" placeholder="00000" id="cp" name="cp" minlength="5" maxlength="5" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Ville :</strong></label>
              <input type="text" placeholder="Ville exemple" id="ville" name="ville" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-form-email u-form-group u-form-group-2">
              <label class="u-label"><strong>Email :</strong></label>
              <!-- Condition si l'établissement a un email -->
              <input type="email" placeholder="exemple@exemple.fr" id="email" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
            </div>

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Numéro de téléphone :</strong></label>
              <input type="number" placeholder="0100000000" id="tel" name="tel" minlength="10" maxlength="10" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Type :</strong></label><br />
              <input type="radio" name="type" value="1"> Scolaire <br /><input type="radio" name="type" value="0"> Autre
            </div>

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Responsable :</strong></label><br />
              <input type="radio" name="civil" value="Mme"> Mme <br /><input type="radio" name="civil" value="M."> M.
              <input type="text" placeholder="Nom" id="nomR" name="nomR" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
              <input type="text" placeholder="Prenom" id="prenomR" name="prenomR" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-form-group u-form-name u-form-group-3">
              <label class="u-label"><strong>Chambres offertes :</strong></label>
              <input type="number" placeholder="0" id="chambre" name="chambre" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>

            <div class="u-align-left u-form-group u-form-submit u-form-group-4">
              <input type="submit" name="envoi" value="Envoyer" class="u-btn u-btn-submit u-button-style">
            </div>
          </form>
        </div>
      </div>
    </section>

<?php
  include('footer.html');
?>