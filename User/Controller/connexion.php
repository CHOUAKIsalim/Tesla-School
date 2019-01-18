<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 14/11/2018
 * Time: 1:43 PM
 */


require_once ("connexionBDD.php");
$username = $_POST["username"];
$password =sha1($_POST["password"]);

$query="Select * from admin where username = '".$username."'";

$account = $connexion->query($query);

if($account->rowCount()>0)
{
    $account = $account->fetch();
    if($account["password"] == $password)
    {
        session_start();
        $_SESSION["username"] = $username;
        header('Location: admin.php');
    }
    else
    {
        header('Location: /Project');
    }
}
else
{
    header('Location: /Project');
}

