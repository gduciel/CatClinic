<?php

final class Vue
{
    public static function ouvrirTampon()
    {
        // On démarre le tampon de sortie, on va l'appeler "tampon principal"
        ob_start();
    }

    public static function recupererContenuTampon()
    {
        // On retourne le contenu du tampon principal
        return ob_get_clean();
    }

    public static function montrer ($S_localisation, $A_parametres = array())
    {
        $S_fichier = Constantes::repertoireVues() . $S_localisation . '.php';

        $S_contenu = '';

        if (is_readable($S_fichier))
        {
            $A_vue = $A_parametres;
            // Démarrage d'un sous-tampon
            ob_start();
            include $S_fichier; // c'est dans ce fichier qu'auront lieu les appels à A_vue, la vue est inclue dans le sous-tampon
            $S_contenu = ob_get_clean(); // le sous tampon est fermé
        }

        echo $S_contenu; // on "recrache" le sous-tampon dans le tampon général
    }
}