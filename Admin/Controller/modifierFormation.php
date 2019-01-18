<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 4:16 PM
 */

require_once ("AdminPageController.php");

$id = $_POST["id"];
$typeformationId = $_POST["typeformationId"];

$admincontroleur = new AdminPageController();
$admincontroleur->modifierFormation($id,$typeformationId);