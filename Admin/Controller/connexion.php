<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:03 PM
 */

require_once ("ConnexionController.php");

$username = $_POST["username"];
$password =sha1($_POST["password"]);
$oontroleurConnexion = new ConnexionController();
$oontroleurConnexion->verifierConnexion($username,$password);
