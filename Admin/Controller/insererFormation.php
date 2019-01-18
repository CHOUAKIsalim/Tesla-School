<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 4:04 PM
 */

require_once ("AdminPageController.php");

$nom = $_POST["nom"];
$typeformationId = $_POST["type"];

$admincontroler = new AdminPageController();
$admincontroler->insererFormation($nom,$typeformationId);