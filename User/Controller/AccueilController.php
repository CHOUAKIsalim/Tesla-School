<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 8:15 PM
 */

require_once ("C:\wamp64\www\Tesla\User\Model\TypeFormation.php");
require_once ("C:\wamp64\www\Tesla\User\Model\Formation.php");

class AccueilController
{
    private $typeFormationGetter;
    private $formationGetter;

    public function __construct()
    {
        $this->typeFormationGetter = new TypeFormation();
        $this->formationGetter = new Formation();
    }

    public function getTypesFormations()
    {
        $res = $this->typeFormationGetter->getAllTypesFormation();
        for ($i=0 ; $i<count($res) ; $i++)
        {
            $res[$i]["ttc"] = $res[$i]["prixht"] +  ($res[$i]["prixht"] * $res[$i]["taux"] / 100);
        }
        return $res;
    }

    public function getSousFormations($typesFormations)
    {
        $result = [];
        foreach ($typesFormations as $row)
       {

             $sousFormations = $this->formationGetter->getFormations($row["id"]);
             $result[$row["id"]] = $sousFormations;
        }
        return $result;
    }

}