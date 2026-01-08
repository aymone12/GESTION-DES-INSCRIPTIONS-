<?php
include_once("../functions/function_cours.php");
include_once("../functions/function_etudiant.php");
include_once("../functions/function_professeur.php");
include_once("../functions/function_inscription.php");

// Set headers to force download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=rapport_activite_' . date('Y-m-d') . '.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// BOM for Excel compatibility with UTF-8
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

// --- Summary Section ---
fputcsv($output, ['--- RAPPORT D\'ACTIVITÉ ---']);
fputcsv($output, []);
fputcsv($output, ['STATISTIQUES GLOBALES']);
fputcsv($output, ['Total Etudiants', count_etudiants()]);
fputcsv($output, ['Total Professeurs', count_professeurs()]);
fputcsv($output, ['Total Cours', count_cours()]);
fputcsv($output, ['Revenus Totaux', calculate_total_revenue() . ' EUR']);
fputcsv($output, []);
fputcsv($output, []);

// --- Inscriptions Details ---
fputcsv($output, ['DETAIL DES INSCRIPTIONS']);
fputcsv($output, ['Date', 'Etudiant', 'Email', 'Cours']);

$inscriptions = get_all_inscriptions();

foreach ($inscriptions as $row) {
    fputcsv($output, [
        $row['dateInscription'],
        $row['nom'] . ' ' . $row['prenom'],
        $row['email'],
        $row['nomCours']
    ]);
}

fclose($output);
exit();
?>
