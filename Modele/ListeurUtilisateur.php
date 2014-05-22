<?php

// Cette classe sert pour l'instant à lister des utilisateurs

class ListeurUtilisateur extends Listeur implements ListeurInterface
{
    public function __construct() {
        $this->_S_nomTable = Constantes::TABLE_USER;
    }

    public function lister ($I_debut = null, $I_fin = null)
    {
    }
}