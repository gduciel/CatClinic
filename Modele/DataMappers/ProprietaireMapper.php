<?php

final class ProprietaireMapper extends CorrespondanceTable implements CorrespondanceTableInterface
{
    public function __construct()
    {
        parent::__construct(Constantes::TABLE_PROPRIETAIRE);
        $this->_S_classeMappee = 'Proprietaire';
    }

    public function trouverParIdentifiantUtilisateur ($I_identifiant)
    {
        $S_requete    = "SELECT id, nom, prenom, id_chat  FROM " . $this->_S_nomTable .
                        " WHERE id_utilisateur = ?";
        $A_paramsRequete = array($I_identifiant);

        $O_connexion  = ConnexionMySQL::recupererInstance();

        if ($A_proprietaire = $O_connexion->projeter($S_requete, $A_paramsRequete))
        {
            // On sait donc qu'on aura 1 seul enregistrement dans notre tableau
            $O_proprietaireTemporaire = $A_proprietaire[0];

            if (is_object($O_proprietaireTemporaire)) {
                if (class_exists($this->_S_classeMappee)) {
                    $O_proprietaire = new $this->_S_classeMappee;

                    $O_proprietaire->changeIdentifiant($O_proprietaireTemporaire->id);
                    $O_proprietaire->changeNom($O_proprietaireTemporaire->nom);
                    $O_proprietaire->changePrenom($O_proprietaireTemporaire->prenom);
                }
            } else {
                throw new LogicException ('La classe "' . $this->_S_classeMappee . '" n\'existe pas');
            }

            // je cherche le chat relié à ce propriétaire

            if ($O_proprietaireTemporaire->id_chat) {
                $O_chatMapper = new ChatMapper();
                $O_chat = $O_chatMapper->trouverParIdentifiant((integer)$O_proprietaireTemporaire->id_chat);
                $O_proprietaire->changeChat($O_chat);
            }

            return $O_proprietaire;
        }
        else
        {
            // Je n'ai rien trouvé, je lève une exception pour le signaler au client de ma classe
            throw new Exception ("Il n'existe pas d'utilisateur d'identifiant '$I_identifiant'");
        }
    }

    public function creer (Proprietaire $O_proprietaire)
    {
        // à implémenter
    }

    public function actualiser (Proprietaire $O_proprietaire)
    {
        // à implémenter
    }

    public function supprimer (Proprietaire $O_proprietaire)
    {
        // à implémenter
    }

    public function trouverParIdentifiant ($I_identifiant)
    {
        // à implémenter
    }
}