<?php

include("bibliotheque.php");

// FONCTIONS DE GESTION DES ÉTABLISSEMENTS

function obtenirReqEtablissements()
{
   $req="select id, nom from Etablissement order by id";
   return $req;
}

function obtenirReqEtablissementsOffrantChambres()
{
   $req="select id, nom, nombreChambresOffertes from Etablissement where 
         nombreChambresOffertes!=0 order by id";
   return $req;
}

function obtenirReqEtablissementsAyantChambresAttribuées()
{
   $req="select distinct etablissement.id as id, nom, nombreChambresOffertes from Etablissement, 
         Attribution where id = idEtab order by id";
   return $req;
}

function obtenirDetailEtablissement($id)
{
   $req="select * from Etablissement where id='$id'";
   return $req;
}

function supprimerEtablissement($id)
{
   $req="delete from Etablissement where id='$id'";
   return $req;
}
 
function modifierEtablissement($id, $nom, $adresse, $cp, 
                               $ville, $tel, $email, $type, 
                               $civil, $nomR, $prenomR, $chambre)
{  
  
   $req="update Etablissement set nom='$nom',adresseRue='$adresse',
         codePostal='$cp',ville='$ville',tel='$tel',
         adresseElectronique='$email',type='$type',
         civiliteResponsable='$civil',nomResponsable=
         '$nomR',prenomResponsable='$prenomR',
         nombreChambresOffertes='$chambre' where id='$id'";
   
  return $req;
}

function creerEtablissement($id, $nom, $adresse, $cp, 
                               $ville, $tel, $email, $type, 
                               $civil, $nomR, $prenomR, $chambre)
{ 
   
   $req="insert into Etablissement values ('$id', '$nom', '$adresse', 
         '$cp', '$ville', '$tel', '$email', '$type', 
         '$civil', '$nomR', '$prenomR',
         '$chambre')";
   
   return $req;
}


function estUnIdEtablissement($id)
{
   $req="select * from Etablissement where id='$id'";
   return $req;
}

function estUnNomEtablissement($mode, $id, $nom)
{
   $nom=str_replace("'", "''", $nom);
   // S'il s'agit d'une création, on vérifie juste la non existence du nom sinon
   // on vérifie la non existence d'un autre établissement (id!='$id') portant 
   // le même nom
   if ($mode=='C')
   {
      $req="select * from Etablissement where nom='$nom'";
   }
   else
   {
      $req="select * from Etablissement where nom='$nom' and id!='$id'";
   }
   return $req;
}

function obtenirNbEtab()
{
   $req="select count(*) as nombreEtab from Etablissement";
   $res=$bdd->query($req);
   $lgEtab=$res->fetch();
   return $nbOccup['nombreEtab'];
}

function obtenirNbEtabOffrantChambres()
{
   $req="select count(*) as nombreEtabOffrantChambres from Etablissement where 
         nombreChambresOffertes!=0";
   return $req;
}

// Retourne false si le nombre de chambres transmis est inférieur au nombre de 
// chambres occupées pour l'établissement transmis 
// Retourne true dans le cas contraire
function estModifOffreCorrecte($idEtab, $nombreChambres)
{
   $nbOccup=obtenirNbOccup($connexion, $idEtab);
   return ($nombreChambres>=$nbOccup);
}

// FONCTIONS RELATIVES AUX GROUPES

function obtenirReqIdNomGroupesAHeberger()
{
   $req="select id, nom from Groupe where hebergement='O' order by id";
   return $req;
}

function obtenirNomGroupe($id)
{
   $req="select nom from Groupe where id='$id'";
   return $req;
}

// FONCTIONS RELATIVES AUX ATTRIBUTIONS

// Teste la présence d'attributions pour l'établissement transmis    
function existeAttributionsEtab($id)
{
   $req="select * From Attribution where idEtab='$id'";
   return $req;
}

// Retourne le nombre de chambres occupées pour l'id étab transmis
function obtenirNbOccup($idEtab)
{
   $requete="select IFNULL(sum(nombreChambres), 0) as totalChambresOccup from
        Attribution where idEtab='$idEtab'";
   return $requete;

}

// Met à jour (suppression, modification ou ajout) l'attribution correspondant à
// l'id étab et à l'id groupe transmis
function modifierAttribChamb($idEtab, $idEquipe, $nbChambres)
{
   $req="select count(*) as nombreAttribGroupe from Attribution where idEtab=
        '$idEtab' and idEquipe='$idEquipe'";
   $rsAttrib=mysql_query($req, $connexion);
   $lgAttrib=mysql_fetch_array($rsAttrib);
   if ($nbChambres==0)
      $req="delete from Attribution where idEtab='$idEtab' and idGroupe='$idGroupe'";
   else
   {
      if ($lgAttrib["nombreAttribGroupe"]!=0)
         $req="update Attribution set nombreChambres=$nbChambres where idEtab=
              '$idEtab' and idGroupe='$idGroupe'";
      else
         $req="insert into Attribution values('$idEtab','$idGroupe', $nbChambres)";
   }
   return $req;
}

// Retourne la requête permettant d'obtenir les id et noms des groupes affectés
// dans l'établissement transmis
function obtenirReqGroupesEtab($idEtab)
{
   $req="select distinct id, nom, nombreChambres, nomVille from equipe, Attribution where 
        Attribution.idEquipe=equipe.id and idEtab='$idEtab'";
   return $req;
}
            
// Retourne le nombre de chambres occupées par le groupe transmis pour l'id étab
// et l'id groupe transmis
function obtenirNbOccupGroupe($idEtab, $idEq)
{
   $req="select nombreChambres From Attribution where idEtab='$idEtab'
        and idEquipe='$idEq'";
   return $req;

}
?>