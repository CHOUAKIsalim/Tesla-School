<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 9:45 PM
 */

require_once ("bddConnexion.php");
class TypeFormation
{

    public function getAllTypesFormation()
    {
        $requete = "Select * from type_formation";
        $res =  bddConnexion::execute_query($requete);
        return $res;
    }

    public function supprimerTypeFormation($id)
    {
        $query = "Delete from type_formation where id = ".$id;
        return bddConnexion::execute_query($query);
    }

    public function insertTypeFormation($nom,$volume,$ht,$taxe)
    {
        $query = "INSERT INTO type_formation (nom,volumeHorraire,prixht,taux) VALUES ('".$nom."',".$volume.",".$ht.",".$taxe.")";
        return bddConnexion::execute_query($query);
    }

    public function modifierTypeFormation($id,$volumeHorraire,$prixht,$taux)
    {
        $query = "UPDATE type_formation SET volumeHorraire= ".$volumeHorraire.", prixht = ".$prixht.", taux = ".$taux." WHERE id = ".$id;
        return bddConnexion::execute_query($query);
    }
}

