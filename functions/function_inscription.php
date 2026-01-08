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

/*============================================================*/
/* Calculer le revenu total                                   */
/*============================================================*/
function calculate_total_revenue()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("
            SELECT SUM(c.prix) 
            FROM Inscription i 
            JOIN Cours c ON i.idCours = c.idCours
        ");
        $r->execute();
        return $r->fetchColumn() ?: 0;
    } catch (\Throwable $th) {
        return 0;
    }
}

/*============================================================*/
/* Compter le nombre total d'inscriptions                     */
/*============================================================*/
function count_inscriptions()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT COUNT(*) FROM Inscription");
        $r->execute();
        return $r->fetchColumn();
    } catch (\Throwable $th) {
        return 0;
    }
}

/*============================================================*/
/* Récupérer les dernières inscriptions (tous cours confondus)*/
/*============================================================*/
function get_recent_inscriptions($limit = 5)
{
    try {
        $cnx = connecter_db();
        // Join with Etudiant and Cours to get all details for the dashboard table
        // Assumes Inscription table has dateInscription
        $r = $cnx->prepare(
            "SELECT i.*, e.nom, e.prenom, e.email, c.intitule as nomCours
             FROM Inscription i
             JOIN Etudiant e ON i.idEtudiant = e.id
             JOIN Cours c ON i.idCours = c.idCours
             ORDER BY i.dateInscription DESC
             LIMIT :limit"
        );
        $r->bindValue(':limit', $limit, PDO::PARAM_INT);
        $r->execute();
        return $r->fetchAll();
    } catch (\Throwable $th) {
        return [];
    }
}

/*============================================================*/
/* Récupérer toutes les inscriptions (pour rapport)           */
/*============================================================*/
function get_all_inscriptions()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare(
            "SELECT i.*, e.nom, e.prenom, e.email, c.intitule as nomCours
             FROM Inscription i
             JOIN Etudiant e ON i.idEtudiant = e.id
             JOIN Cours c ON i.idCours = c.idCours
             ORDER BY i.dateInscription DESC"
        );
        $r->execute();
        return $r->fetchAll();
    } catch (\Throwable $th) {
        return [];
    }
}

/*============================================================*/
/* Calculer le taux de complétion                             */
/*============================================================*/
function calculate_completion_rate() {
    return 0;
}

/*============================================================*/
/* Ajouter une inscription                                    */
/*============================================================*/
function ajouter_inscription($idEtudiant, $idCours, $dateInscription, $statut = 'En cours', $note = null)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("INSERT INTO Inscription (idEtudiant, idCours, dateInscription, statut, note) VALUES (?, ?, ?, ?, ?)");
        return $r->execute([$idEtudiant, $idCours, $dateInscription, $statut, $note]);
    } catch (\Throwable $th) {
        echo "erreur d'ajout de l'inscription : " . $th->getMessage();
        return false;
    }
}

/*============================================================*/
/* Trouver une inscription par ID                             */
/*============================================================*/
function find_inscription_by_id($idInscription)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare(
            "SELECT i.*, e.nom, e.prenom, e.email, c.intitule as nomCours
             FROM Inscription i
             JOIN Etudiant e ON i.idEtudiant = e.id
             JOIN Cours c ON i.idCours = c.idCours
             WHERE i.idInscription = ?"
        );
        $r->execute([$idInscription]);
        return $r->fetch();
    } catch (\Throwable $th) {
        echo "erreur de sélection de l'inscription : " . $th->getMessage();
        return null;
    }
}

/*============================================================*/
/* Modifier une inscription                                   */
/*============================================================*/
function modifier_inscription($idEtudiant, $idCours, $dateInscription, $statut, $note, $idInscription)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("UPDATE Inscription SET idEtudiant = ?, idCours = ?, dateInscription = ?, statut = ?, note = ? WHERE idInscription = ?");
        return $r->execute([$idEtudiant, $idCours, $dateInscription, $statut, $note, $idInscription]);
    } catch (\Throwable $th) {
        echo "erreur de mise à jour de l'inscription : " . $th->getMessage();
        return false;
    }
}

/*============================================================*/
/* Supprimer une inscription                                  */
/*============================================================*/
function supprimer_inscription($idInscription)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("DELETE FROM Inscription WHERE idInscription = ?");
        return $r->execute([$idInscription]);
    } catch (\Throwable $th) {
        echo "erreur de suppression de l'inscription : " . $th->getMessage();
        return false;
    }
}

/*============================================================*/
/* Lister toutes les inscriptions                             */
/*============================================================*/
function lister_inscriptions()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare(
            "SELECT i.*, e.nom, e.prenom, e.email, c.intitule as nomCours, c.prix
             FROM Inscription i
             JOIN Etudiant e ON i.idEtudiant = e.id
             JOIN Cours c ON i.idCours = c.idCours
             ORDER BY i.dateInscription DESC"
        );
        $r->execute();
        return $r->fetchAll();
    } catch (\Throwable $th) {
        echo "erreur de sélection des inscriptions : " . $th->getMessage();
        return [];
    }
}

?>