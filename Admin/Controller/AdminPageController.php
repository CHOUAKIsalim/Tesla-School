<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:45 PM
 */

require_once ("C:\wamp64\www\Tesla\Admin\Model\Formation.php");
require_once ("C:\wamp64\www\Tesla\Admin\Model\TypeFormation.php");


class AdminPageController
{
    private $formationGetter;
    private $typeFormationGetter;
    public function __construct()
    {
        $this->formationGetter = new Formation();
        $this->typeFormationGetter = new TypeFormation();
    }

    public function getFormationsWithTypes()
    {
        return $this->formationGetter->getFormationsWithTypes();
    }

    public function getFormationTypes()
    {
        return $this->typeFormationGetter->getAllTypesFormation();
    }

    public function supprimerFormation($id)
    {
        return $this->formationGetter->supprimerFormation($id);
    }

    public function supprimerTypeFormation($id)
    {
        return $this->typeFormationGetter->supprimerTypeFormation($id);
    }

    public function insererFormation($nom,$typeformationId)
    {
        return $this->formationGetter->insererFormation($nom,$typeformationId);
    }

    public function insererTypeFormation($nom,$volume,$ht,$taxe,$formation)
    {
        $this->typeFormationGetter->insertTypeFormation($nom,$volume,$ht,$taxe);
        return $this->formationGetter->insererFormation($formation,bddConnexion::getLastInsertedId());
    }

    public function modifierFormation($id,$typeformationId)
    {
        $this->formationGetter->modifierFormation($id,$typeformationId);
    }

    public function modifierTypeFormation($id,$volumeHorraire,$prixht,$taux)
    {
        return $this->typeFormationGetter->modifierTypeFormation($id,$volumeHorraire,$prixht,$taux);
    }
}