<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 28/11/2018
 * Time: 3:40 PM
 */

require_once ("AdminPageController.php");
$admincontroler = new AdminPageController();
$id = $_POST["id"];

$admincontroler->supprimerFormation($id);
