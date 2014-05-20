<?php

// Cette classe qui gère la connexion est un design pattern Singleton,
// sans doute le plus décrié de tous !

class ConnexionMySQL
{
	private static $O_instance;

	protected $_connexion; // C'est là que réside ma connexion PDO

	private function __construct ($S_nomBase, $S_environnement)
	{
		$A_params = parse_ini_file(Constantes::DATABASE_CONFIG_FILE, true);

		if (!$A_params) { // parse_ini_file renvoie false en cas de paramètres érronnés
			throw new BaseDeDonneesException('Connexion impossible : les paramètres sont incorrects');
		}

		if ($A_params[$S_environnement]) {
			// j'écrase le tableau complet avec celui qui m'interesse
			$A_params = $A_params[$S_environnement];
			// j'exige qu'on me donne de l'UTF8 (regardez le dernier paramètre du constructeur PDO)
			$this->_connexion = new PDO('mysql:host=' . $A_params['serveur'] . 
						';dbname=' . $A_params['basededonnees'],
						$A_params['utilisateur'],
						$A_params['motdepasse'],
						array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			$this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return;
		}

		throw new BaseDeDonneesException('Les paramètres pour l\'environnement "' . $S_environnement . '" n\'existent pas !');
	}

	static public function recupererInstance($S_nomBase = Constantes::DEFAULT_DATABASE_NAME, $S_environnement = 'dev')
	{
		if (!self::$O_instance instanceof self)
		{
			self::$O_instance = new self ($S_nomBase, $S_environnement);
		}

		return self::$O_instance;
	}

	public function projeter ($S_requete, Array $A_params) {
		return $this->_retournerTableau ($this->_connexion->prepare($S_requete), $A_params);
	}

	public function inserer ($S_requete, Array $A_params)
	{
		$O_pdoStatement = $this->_connexion->prepare($S_requete);
		$O_pdoStatement->execute($A_params);
		return $this->_connexion->lastInsertId();
	}

	public function modifier ($S_requete, Array $A_params)
	{
		$O_pdoStatement = $this->_connexion->prepare($S_requete);
		return $O_pdoStatement->execute($A_params);
	}

    private function _retournerTableau (PDOStatement $O_pdoStatement, Array $A_params)
    {
		$O_pdoStatement->execute($A_params);

        $A_tuples = array();

        if ($O_pdoStatement)
		{
            while ($O_tuple = $O_pdoStatement->fetch (PDO::FETCH_OBJ))
			{
                $A_tuples[] = $O_tuple;
            }
        }

        return $A_tuples;
    }
}