<h1>Utilisateurs</h1>
<table>
<caption>Liste des utilisateurs actifs du site</caption>
<thead>
    <tr>
        <td>Identifiant</td>
        <td>Login</td>
        <td>Administrateur</td>
    </tr>
</thead>
<?php

if (count($A_vue['utilisateurs']))
{
    echo '  <tbody>';

    foreach ($A_vue['utilisateurs'] as $O_utilisateur)
    {
        // Allez, on ressort echo, print...
        print '<tr>';
        echo '<td>'. $O_utilisateur->donneIdentifiant()                   . '</td><td>' . 
                        $O_utilisateur->donneLogin()                         . '</td><td>' .
                    ($O_utilisateur->estAdministrateur() ? 'oui' : 'non') . '</td>';
        print '<td><a href="/utilisateur/suppr/' . $O_utilisateur->donneIdentifiant() .
            '" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cet utilisateur ?\'));">
            Effacer</a></td><td><a href="/utilisateur/edit/' . $O_utilisateur->donneIdentifiant() . '">Modifier</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
}
?>
</table>
<?php
    if (isset($A_vue['pagination']))
    {
        echo '<div style="">';
        foreach ($A_vue['pagination'] as $S_lien)
        {
            echo '&nbsp;' . $S_lien;
        }
        echo '</div>';
    }
?>