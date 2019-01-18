<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 3:58 PM
 */


require_once ("AdminPageController.php");
$admincontroler = new AdminPageController();
$id = $_POST["id"];

$admincontroler->supprimerTypeFormation($id);
