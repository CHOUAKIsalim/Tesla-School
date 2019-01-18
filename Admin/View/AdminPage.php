<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:39 PM
 */

require_once ("C:\wamp64\www\Tesla\Admin\Controller\AdminPageController.php");

class AdminPage
{

    private $adminPageController;

    public function __construct()
    {
        $this->adminPageController = new AdminPageController();
    }

    public function afficherTitre()
    {
        echo "aaa";
        echo "<h1 align=\"center\">Page administrateur</h1>";
    }

    public function afficherTableauFormations()
    {
        $tableau =  '<table id="tarifs" align="center" border="1" class="tableau" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Type Formation</th>
                                        <th>Formation</th>
                                        <th>Volume horraire</th>
                                        <th>Prix HT</th>
                                        <th>Taxe</th>
                                        <th>Prix TTI</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';

        $formations = $this->adminPageController->getFormationsWithTypes();

        foreach ($formations as $row)
        {
            $element = "
                    <tr onclick=''>
                        <td>".$row["type"]."</td>"  ;
            if($row["nom"]=="")
            {
                $element.="<td> Aucune Formation </td>";
            }
            else
            {
                $element.="<td>".$row["nom"]."</td>";
            }
            $element.= "              
                        <td>".$row["volumeHorraire"]."</td>
                        <td>".$row["prixht"]."</td>
                        <td>".$row["taux"]."</td>
                        <td>".($row["prixht"] + $row["prixht"] * $row["taux"] / 100)."</td>
                        <td>";
            if($row["nom"]=="")
            {
                $element.="<button onclick='SupprimerTypeFormation(".$row["typeId"].")'> Supprimer </button> </td>";
            }
            else
            {
                $element.="  <button onclick='SupprimerFormation(".$row["id"].")'> Supprimer </button> </td>";
            }
            $element.="</tr> ";
            $tableau.= $element;
    }
    $tableau.="</tbody> </table>";
    echo $tableau;
    }

    public function afficherFormInsertion()
    {
        $formInsertion  = "<div id=\"forms\">";
        $formInsertion.=$this->afficherFormInsertionFormation();
        $formInsertion.=$this->afficherFormInsertionTypeFormation();
        $formInsertion.='</div>';

        echo $formInsertion;
    }

    public function afficherFormModification()
    {
        $res = "    <div id=\"formsModif\">";
        $res.= $this->afficherFormModifFormation();
        $res.= $this->afficherFormModifTypeFormation();
        $res.=" </div>";
        echo $res;
    }

    public function afficherDeconnexion()
    {
        echo "<footer>
                    <form action=\"deconnexion.php\">
                        <input type=\"submit\" value=\"Deconnecter\" style=\"float : right;\">
                    </form>
              </footer>";
    }

    private function afficherFormInsertionFormation()
    {
        $typesFormations = $this->adminPageController->getFormationTypes();
        $resultat = '<div class="formulaire" id="formationForm">
                             <h3 align="center">Ajouter une Formation</h3>
                             Entrez le nom de votre formation <input type="text" id="nomFormation"><br>
                             Selectionnez le type de cette formation
                             <select id="typeFormationIdd">"';
        foreach ($typesFormations as $row)
        {
            $resultat.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $resultat.="    </select>
                        Volume horaire en heure <input type=\"number\" id=\"volumehorraireDis\" disabled><br>
                        Le prix hors taxe <input type=\"number\" id=\"htDis\" disabled><br>
                        Le taux de taxe <input type=\"number\" id=\"taxeDis\" disabled><br>
                        <button class=\"formsButton\" id=\"add\"> Ajouter</button>
                      </div>";
        return $resultat;
    }

    private function afficherFormInsertionTypeFormation()
    {
        $result= "
                          <div class=\"formulaire\" id=\"typeformationForm\">
                          <h3 align=\"center\">Ajouter un Type Formation</h3>
                            Entrez le nom de votre Type Formation <input type=\"text\" id=\"nomTypeFormation\"><br>
                            Entrez le volume horaire en heure <input type=\"number\" id=\"volumehorraire\"><br>
                            Entrez le prix hors taxe <input type=\"number\" id=\"ht\"><br>
                            Entrez le taux de taxe <input type=\"number\" id=\"taxe\"><br>
                            Entrez le nom d'une formation <input type=\"text\" id=\"formation\"><br>
                            <button class=\"formsButton\" id=\"addType\"> Ajouter</button>
                        </div>";
        return $result;
    }

    private function afficherFormModifFormation()
    {
        $toutesFormations = $this->adminPageController->getFormationsWithTypes();
        $typesFormations = $this->adminPageController->getFormationTypes();

        $res = "<div class=\"formulaire\" id=\"formationModifForm\">
                    <h3 align=\"center\">Modifier une Formation</h3>
                    Selectionner une formation
                    <select id=\"formationModifSelect\">";
        foreach ($toutesFormations as $row)
        {
            if($row["nom"])  $res.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }

        $res.=" </select>
                Selectionner son nouveau Type
                <select id=\"newTypeFormationid\">";
        foreach ($typesFormations as $row)
        {
            $res.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $res.=" </select>
                <button class=\"formsButton\" id=\"editFormation\"> Modifier</button>
                </div>";

        return $res;
    }

    private function afficherFormModifTypeFormation()
    {
        $typesFormations = $this->adminPageController->getFormationTypes();

        $res= "<div class=\"formulaire\" id=\"typeformationModifForm\">
                    <h3 align=\"center\">Modifier un Type Formation</h3>
                    Selectionner un Type Formation
                    <select id=\"typeFormationSelectModif\">";

        foreach ($typesFormations as $row)
        {
            $res.= '<option value="'.$row["id"].'">'.$row["nom"].'</option>';
        }
        $res.=" </select>
                Entrez le nouveau volume horaire <input type=\"number\" id=\"volumehorraireModif\"><br>
                Entrez le nouveau prix hors taxe <input type=\"number\" id=\"htModif\"><br>
                Entrez le nouveau taux de taxe <input type=\"number\" id=\"taxeModif\"><br>
                <button class=\"formsButton\" id=\"editType\"> Modifier</button>
                </div>";

        return $res;

    }


}
