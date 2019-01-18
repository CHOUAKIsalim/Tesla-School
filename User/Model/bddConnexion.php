<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 05/12/2018
 * Time: 2:46 PM
 */

class bddConnexion
{
    private static $bdd;

    private static $isConnected = false;

    private static $dbAddress = "mysql:host=localhost;dbname=tdw";

    private static $dbUser = "root";

    private static $dbPassword = "";

    private static function init_connection()
    {
        if(!bddConnexion::$isConnected)
        {
            bddConnexion::$bdd = new PDO(bddConnexion::$dbAddress, bddConnexion::$dbUser, bddConnexion::$dbPassword);
            bddConnexion::$isConnected = true;
        }
    }

    public static function prepare_and_execute_query($requete, $donnees)
    {
        if(!bddConnexion::$isConnected)
        {
            bddConnexion::init_connection();
        }
        $statement = bddConnexion::$bdd->prepare($requete);
        $statement->execute($donnees);
        return self::fetchAll($statement);
    }

    public static function execute_query($requete)
    {
        return self::prepare_and_execute_query($requete,array());
    }

    private static function fetchAll($resultatRequete)
    {
        if($resultatRequete)
        {
            return $resultatRequete->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    public static function fermerConnexion()
    {

    }
}