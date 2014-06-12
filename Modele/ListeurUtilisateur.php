<?php

// Cette classe sert pour l'instant à lister des utilisateurs

class ListeurUtilisateur extends Listeur implements ListeurInterface
{
    public function __construct(Connexion $O_connexion) {
        parent::__construct($O_connexion);
        $this->_S_nomTable = Constantes::TABLE_USER;
    }

    //mes "setteurs" pour modifier les $I_debut et $I_fin
    public function changeDebut($debut)
     {
         $this->$I_debut =  $debut;
     }
    public function lister ($I_debut = null, $I_fin = null)
    {
    
    }
    
    

}
?>
