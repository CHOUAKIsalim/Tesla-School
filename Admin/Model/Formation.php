<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:51 PM
 */

require_once ("bddConnexion.php");

class Formation
{
    public function getFormationsWithTypes()
    {
        $requete = "SELECT f.*, t.nom as type,t.volumeHorraire, t.prixht, t.taux, t.id as typeId FROM formation f right outer JOIN type_formation t ON f.typeformationId = t.id ORDER by t.nom, f.nom";
        return bddConnexion::execute_query($requete);
    }

    public function supprimerFormation($id)
    {
        $query = "Delete from formation where id = ".$id;
        return bddConnexion::execute_query($query);
    }

    public function insererFormation($nom,$typeformationId)
    {
        $query = "INSERT INTO formation (nom,typeformationId) VALUES ('".$nom."',".$typeformationId.")";
        return bddConnexion::execute_query($query);
    }

    public function modifierFormation($id,$typeformationId)
    {
        $query = "UPDATE formation SET typeformationId = ".$typeformationId." WHERE id = ".$id;
        bddConnexion::execute_query($query);
    }
}