<?php
include_once("../functions/function_etudiant.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Vérifier si l'étudiant existe
    $etudiant = find_etudiant_by_id($id);
    
    if ($etudiant) {
        supprimer_etudiant($id);
        header("Location: index_etudiants.php?success=delete");
    } else {
        header("Location: index_etudiants.php?error=Étudiant introuvable");
    }
} else {
    header("Location: index_etudiants.php?error=ID étudiant manquant");
}

exit();
?>