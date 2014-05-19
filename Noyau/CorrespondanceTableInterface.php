<?php

// Cette interface décrit les méthodes de base a implémenter pour 
// travailler sur une table dans une base de données

interface CorrespondanceTableInterface
{
    public function trouverParIdentifiant ($I_identifiant);
}