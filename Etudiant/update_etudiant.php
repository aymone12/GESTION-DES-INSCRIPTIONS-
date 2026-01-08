<?php
// Ce fichier peut être utilisé pour des mises à jour AJAX ou des redirections spécifiques
// Pour l'instant, on redirige vers modifier_etudiant.php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    header("Location: modifier_etudiant.php?id=" . $_GET['id']);
} else {
    header("Location: index_etudiants.php?error=ID étudiant manquant");
}

exit();
?>