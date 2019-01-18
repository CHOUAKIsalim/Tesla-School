<?php
/**
 * Created by PhpStorm.
 * User: Salim
 * Date: 12/12/2018
 * Time: 2:00 PM
 */

class Connexion
{
    public function afficherFormulaire()
    {
        echo "<div id=\"connexion\" align=\"center\" >
                    <form action=\"Controller/connexion.php\" method=\"post\" id=\"formulaireConnexion\">
                        <h2> Connexion </h2>
                        <div class=\"container\">
                        Username : <input type=\"text\" id=\"username\" name=\"username\" placeholder=\"Username\" required>
                        <br/>
                        <br/>
                        Password : <input type=\"password\" id=\"pas   sword\" name=\"password\" placeholder=\"*************\" required>
                        </div>
                        <button type=\"submit\" class=\"connexion\">Connexion </button>
                        <button type=\"reset\"  class=\"cancelbtn\">Cancel</button>
                    </form>
              </div>";
    }
}