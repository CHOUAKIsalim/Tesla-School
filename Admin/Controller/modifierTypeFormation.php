<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 4:39 PM
 */

require_once ("AdminPageController.php");

$id = $_POST["id"];
$volumeHorraire = $_POST["volumeHorraire"];
$prixht = $_POST["prixht"];
$taux = $_POST["taux"];

$admincontroleur = new AdminPageController();
$admincontroleur->modifierTypeFormation($id,$volumeHorraire,$prixht,$taux);