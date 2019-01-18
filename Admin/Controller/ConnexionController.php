<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:09 PM
 */

require_once ("../Model/Admin.php");


class ConnexionController
{
    private $adminGetter;

    public function __construct()
    {
        $this->adminGetter = new Admin();
    }

    public function verifierConnexion($username, $password)
    {

        $result = $this->adminGetter->verifyAdmin($username);
        if(count($result)>0)
        {
            if($result[0]["password"] == $password)
            {
                echo "aaa";
                session_start();
                $_SESSION["username"] = $username;
                header('Location: /Tesla/Admin/admin.php');
            }
            else
            {
                echo "bbb";
                header('Location: /Tesla/Admin');
            }
        }
        else
        {
            header('Location: /Tesla/Admin');
        }
    }
}