<?php
require_once("../functions/function_cours.php");

$deletedCourse = null;
$error = null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idCours = (int) $_GET['id'];

    
    $deletedCourse = find_cours_by_id($idCours);

    if ($deletedCourse) {
        
        supprimer_cours($idCours);
    } else {
        $error = "Cours non trouvé.";
    }
} else {
    $error = "ID du cours manquant.";
}
header("Location: index_cours.php");
exit();
?>