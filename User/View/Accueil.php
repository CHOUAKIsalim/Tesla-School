<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 11/12/2018
 * Time: 3:05 PM
 */

require_once ("C:\wamp64\www\Tesla\User\Controller\AccueilController.php");

class Accueil
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new AccueilController();
    }


    public function startSession()
    {
        session_start();
    }

    public function afficherTitre()
    {
        echo "  <h1 align=\"center\">Tesla School</h1>
                <h1 align=\"center\">
                <bdi> مدرسة تسلا</bdi>
                </h1>";
    }

    public function afficherDiaporama()
    {
        echo "<div id=\"diaporama\" width=\"100%\">
              <img src=\"View/Images/diapo5.jpg\"/>
              <img src=\"View/Images/image accueil.jpg\"/>
              <img src=\"View/Images/diapo2.jpg\"/>
              <img src=\"View/Images/diapo3.jpg\"/>
              <img src=\"View/Images/diapo4.jpg\"/>
              </div>";
    }
    public function afficherMenu()
    {
        $typesformations = $this->controleur->getTypesFormations();

        $sous_formations = $this->controleur->getSousFormations($typesformations);
        $menu =  "<div id=\"menu\" width=\"100%\"> <ul id=\"listeMenu\">";
            foreach ($typesformations as $row)
        {
            $element ='<div class="liste">
                            <li> <a href="" class="lien formations">'.$row["nom"].'</a>' ;
                                if(count($sous_formations[$row["id"]]) >0)
                                {
                                    $element .= '<div class="sous-liste"><ul>';
                                }

                                foreach ($sous_formations[$row["id"]] as $item)
                                {
                                    $element.= '<li class="formations"> <a href="#">'.$item["nom"].'</a></li>';
                                }
                                if(count($sous_formations[$row["id"]]) >0)
                           {
                                    $element .= '</ul></div> ';
                                }
                                $element.="</li> </div>";
                                $menu.=$element;
        }
        $menu.= "</ul></div>";
        echo $menu;
    }
    public function afficherVideo()
    {
        echo "  <h2 align=\"center\"> Vidéo de présentation </h2>
                <video align=\"center\" src=\"View/Videos/Video accueil.mp4\" preload=\"auto\" controls autoplay width=\"100%\">
                    <p> Vidéo de présentation </p>
                </video>";
    }

    public function afficherContact()
    {
        echo "<a class=\"lien\" href=\"mailto:fs_chouaki@esi.dz\">Contactez Nous </a>";
    }

    public function afficherTableauTarifs()
    {
        $formations = $this->controleur->getTypesFormations();
        $tableau = ' <h2 align="center"> Liste des Formations </h2>
                     <table id="tarifs" align="center" border="1" class="tableau" width="50%">
                        <thead>
                            <tr>
                                <th>Formation</th>
                                <th>Volume horraire</th>
                                <th>Prix HT</th>
                                <th>Taxe</th>
                                <th>Prix TTI</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach ($formations as $row)
        {
            $element = "<tr>
                            <td>".$row["nom"]."</td>
                            <td>".$row["volumeHorraire"]."</td>
                            <td>".$row["prixht"]."</td>
                            <td>".$row["taux"]."</td>
                            <td>".$row["ttc"]." </td>
                </tr> ";
            $tableau .= $element;
        }
        $tableau.="</tbody> </table>";
        echo $tableau;
    }
}