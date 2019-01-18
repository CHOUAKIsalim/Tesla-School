<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 9:39 AM
 */


require_once ("bddConnexion.php");

class Formation
{
    function getFormations($type)
    {
        $requete = "SELECT * FROM formation f WHERE f.typeformationId = ".$type;
        return bddConnexion::execute_query($requete);
    }

}