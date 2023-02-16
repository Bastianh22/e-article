<?php
    require_once('./models/params.php');

    class db_connect {

        protected $cnx;
        
        public function __construct()
        {
            global $PARAM_HOTE, $PARAM_PORT, $PARAM_BDD, $PARAM_USER, $PARAM_PWD;
            try
            {	
                $this->cnx = new PDO ("mysql:host=" . $PARAM_HOTE . ";port=" . $PARAM_PORT . ";dbname=" . $PARAM_BDD, $PARAM_USER, $PARAM_PWD);
                return true;
            }
            catch (Exception $ex)
            {
                echo ("Echec de la connexion a la base de donnees <br>");
                echo ("Erreur numero : " . $ex->getCode() . "<br />" . "Description : " . $ex->getMessage() . "<br>");
                echo ("PARAM_HOTE = " . $PARAM_HOTE);
                return false;
            }
        }

        public function __destruct()
        {
            // ferme la connexion à MySQL :
            unset($this->cnx);
        }
    }
    