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
    public function changefin($fin)
     {
        $this->$I_fin =  $fin;
     }
     //mes getter pour retourner les $I_debut et $I_fin
    public function donneDebut()
     {
        return $this->I_debut;
     }
    public function donneFin()
     {
        return $this->I_fin;
     }
     
    public function recupererCible () 
    {
        return $this-> _S_nomTable;
        // recupere la table TABLE_USER
    }     
     
    public function lister ($I_debut = null, $I_fin = null)
    {
        $S_requete = 'SELECT count(*) AS nb FROM ' .  $this -> recupererCible();
        // cette requete va retourner le nombre d'element de la table TABLE_USER

    }
    
    

}
?>
