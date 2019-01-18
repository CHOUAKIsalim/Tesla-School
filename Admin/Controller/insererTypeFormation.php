<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 4:04 PM
 */

require_once ("AdminPageController.php");



$nom = $_POST["nom"];
$volume = $_POST["volumeHorraire"];
$ht = $_POST["prixht"];
$taxe = $_POST["taux"];
$formation = $_POST["formation"];

$admincontroler = new AdminPageController();

$admincontroler->insererTypeFormation($nom,$volume,$ht,$taxe,$formation);