<?php

// Cette classe sert pour l'instant à lister des utilisateurs

class ListeurUtilisateur extends Listeur implements ListeurInterface
{
    public function __construct(Connexion $O_connexion) {
        parent::__construct($O_connexion);
        $this->_S_nomTable = Constantes::TABLE_USER;
    }

    public function lister ($I_debut = null, $I_fin = null)
    {
    
    }
    
    
    public function recupererNbEnregistrements()
    {
        
    }
    
    public function recupererCible()
    {
        
    }
}
?>
