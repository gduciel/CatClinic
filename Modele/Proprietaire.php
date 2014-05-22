<?php

final class Proprietaire
{
    private $_S_nom;

    private $_S_prenom;

    private $_O_chat = null;

    // Mes mutateurs (setters)
    public function changeIdentifiant ($identifiant)
    {
        $this->_I_identifiant = $identifiant;
    }

    public function changeNom ($nom)
    {
        $this->_S_nom = $nom;
    }

    public function changePrenom ($prenom)
    {
        $this->_S_prenom = $prenom;
    }

    public function changeChat (Chat $O_chat = null)
    {
        $this->_O_chat = $O_chat;
    }

    // Mes accesseurs (getters)

    public function donneIdentifiant ()
    {
        return $this->_I_identifiant;
    }

    public function donneNom ()
    {
        return $this->_S_nom;
    }

    public function donnePrenom ()
    {
        return $this->_S_prenom;
    }

    public function donneChat ()
    {
        return $this->_O_chat;
    }
}