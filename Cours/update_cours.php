<?php
include_once("../functions/function_cours.php");
include_once("../functions/function_professeur.php");


if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index_cours.php?error=ID cours manquant");
    exit();
}

$cours_id = $_GET['id'];
$cours = find_cours_by_id($cours_id);

if (!$cours) {
    header("Location: index_cours.php?error=Cours introuvable");
    exit();
}

$professeurs = all_professeurs();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProf = $_POST['idProf'];
    $code = $_POST['code'];
    $intitule = $_POST['intitule'];
    $description = $_POST['description'];
    $dureeHeures = $_POST['dureeHeures'];
    $prix = $_POST['prix'];

    update_cours($idProf, $code, $intitule, $description, $dureeHeures, $prix, $cours_id);
    header("Location: index_cours.php?success=1");
    exit();
}
?>