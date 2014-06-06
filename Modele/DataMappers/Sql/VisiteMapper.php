<?php

final class VisiteMapper extends CorrespondanceTable implements CorrespondanceTableInterface
{
    public function __construct(Connexion $O_connexion)
    {
        parent::__construct(Constantes::TABLE_VISITE);
        $this->_S_classeMappee = 'Visite';
        $this->_O_connexion = $O_connexion;
    }

    public function trouverParIdentifiant ($I_identifiant)
    {
        $S_requete    = "SELECT id, id_praticien, id_chat, date, prix, observations FROM " . $this->_S_nomTable .
                        " WHERE id = $I_identifiant";

        if ($A_visite = $this->_O_connexion->projeter($S_requete))
        {
            $O_visiteTemporaire = $A_visite[0];

            if (is_object($O_visiteTemporaire)) {
                if (class_exists($this->_S_classeMappee)) {
                    $O_visite = new $this->_S_classeMappee;

                    $O_visite->changeIdentifiant($O_visiteTemporaire->id);
                    $O_visite->changePrix($O_visiteTemporaire->prix);
                    $O_visite->changeDate($O_visiteTemporaire->date);
                    $O_visite->changeObservations($O_visiteTemporaire->observations);

                    return $O_visite;
                }
            }
        }
        else
        {
            // Je n'ai rien trouvé, je lève une exception pour le signaler au client de ma classe
            throw new Exception ("Il n'existe pas de visite pour l'identifiant '$I_identifiant'");
        }
    }

    public function trouverParIdentifiantChat ($I_identifiantChat)
    {
        $S_requete    = "SELECT id_praticien, id_chat, date, prix, observations FROM " . $this->_S_nomTable .
                        " WHERE id_chat = ?"; // on peut renvoyer plusieurs visites pour un chat
        $A_paramsRequete = array($I_identifiantChat);

        if ($A_visite = $this->_O_connexion->projeter($S_requete, $A_paramsRequete))
        {
            $A_visites = null;

            if (class_exists($this->_S_classeMappee)) {

                foreach ($A_visite as $O_visiteEnBase)
                {
                    $O_visite = new $this->_S_classeMappee;
                    $O_visite->changePrix($O_visiteEnBase->prix);
                    $O_visite->changeDate($O_visiteEnBase->date);
                    $O_visite->changeObservations($O_visiteEnBase->observations);

                    $A_visites[] = $O_visite;
                }
            }

            return $A_visites;
        }
        else
        {
            // Je n'ai rien trouvé, je lève une exception pour le signaler au client de ma classe
            throw new Exception ("Il n'existe pas de visite pour l'identifiant de chat '$I_identifiantChat'");
        }
    }

    public function creer(Visite $O_visite)
    {
    }

    public function actualiser(Visite $O_visite)
    {
    }

    public function supprimer(Visite $O_visite)
    {
    }
}