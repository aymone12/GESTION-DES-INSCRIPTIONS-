<?php

include_once("function_utiles.php");

/*============================================================*/
/* Récupérer les inscriptions d'un cours                      */
/*============================================================*/
function get_inscriptions_by_cours($idCours)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare(
            "SELECT i.*, e.nom, e.prenom, e.email, e.cne
             FROM Inscription i
             JOIN Etudiant e ON i.idEtudiant = e.id
             WHERE i.idCours = ?
             ORDER BY i.dateInscription DESC"
        );
        $r->execute([$idCours]);
        return $r->fetchAll();
    } catch (\Throwable $th) {
        echo "erreur de récupération des inscriptions : " . $th->getMessage();
        return [];
    }
}
