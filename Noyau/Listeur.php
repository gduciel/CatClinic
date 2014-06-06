<?php

abstract class Listeur {

    protected $_O_connexion;

    protected $_S_nomTable;

    public function __construct($O_connexion)
    {
        $this->_O_connexion = $O_connexion;
    }

    public function recupererCible()
    {
        return $this->_S_nomTable;
    }

    public function recupererNbEnregistrements()
    {
        $S_requete      = 'SELECT count(*) AS nb FROM ' . $this->recupererCible();

        $A_enregistrements = $this->_O_connexion->projeter($S_requete);
        $O_enregistrement = $A_enregistrements[0];

        return $O_enregistrement->nb;
    }
}