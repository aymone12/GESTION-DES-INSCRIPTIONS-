<?php

include_once("function_utiles.php");

/*============================================================*/
/* Ajouter un cours                                           */
/*============================================================*/
function ajouter_cours($idProf, $code, $intitule, $description, $dureeHeures, $prix)
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare(
            "INSERT INTO Cours (idProf, code, intitule, description, dureeHeures, prix)
             VALUES (?, ?, ?, ?, ?, ?)"
        );

        $r->execute([$idProf, $code, $intitule, $description, $dureeHeures, $prix]);
    } catch (\Throwable $th) {
        echo "erreur d'ajout du cours : " . $th->getMessage();
    }
}

/*============================================================*/
/* Supprimer un cours                                         */
/*============================================================*/
function supprimer_cours($idCours)
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare("DELETE FROM Cours WHERE idCours = ?");
        $r->execute([$idCours]);
    } catch (\Throwable $th) {
        echo "erreur de suppression du cours : " . $th->getMessage();
    }
}

/*============================================================*/
/* Modifier un cours                                          */
/*============================================================*/
function modifier_cours($idProf, $code, $intitule, $description, $dureeHeures, $prix, $idCours)
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare(
            "UPDATE Cours
             SET idProf = ?, code = ?, intitule = ?, description = ?, dureeHeures = ?, prix = ?
             WHERE idCours = ?"
        );

        $r->execute([$idProf, $code, $intitule, $description, $dureeHeures, $prix, $idCours]);
    } catch (\Throwable $th) {
        echo "erreur de mise à jour du cours : " . $th->getMessage();
    }
}

/*============================================================*/
/* Récupérer tous les cours                                   */
/*============================================================*/
function all_cours()
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare("SELECT * FROM Cours ORDER BY idCours DESC");
        $r->execute();

        return $r->fetchAll();
    } catch (\Throwable $th) {
        echo "erreur de sélection des cours : " . $th->getMessage();
        return [];
    }
}

/*============================================================*/
/* Trouver un cours par ID                                    */
/*============================================================*/
function find_cours_by_id($idCours)
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare(
            "SELECT c.*, p.nom AS nomProf, p.prenom AS prenomProf 
             FROM Cours c 
             LEFT JOIN Professeur p ON c.idProf = p.idProf 
             WHERE c.idCours = ?"
        );
        $r->execute([$idCours]);

        return $r->fetch();
    } catch (\Throwable $th) {
        echo "erreur de sélection du cours : " . $th->getMessage();
        return null;
    }
}

/*============================================================*/
/* Récupérer les cours avec leur professeur                   */
/*============================================================*/
function all_cours_with_professeur()
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare(
            "SELECT c.*, p.nom AS nomProf, p.prenom AS prenomProf
             FROM Cours c
             LEFT JOIN Professeur p ON c.idProf = p.idProf
             ORDER BY c.idCours DESC"
        );

        $r->execute();
        return $r->fetchAll();
    } catch (\Throwable $th) {
        echo "erreur de sélection des cours avec professeur : " . $th->getMessage();
        return [];
    }
}

/*============================================================*/
/* Compter le nombre total de cours                           */
/*============================================================*/
function count_cours()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT COUNT(*) FROM Cours");
        $r->execute();
        return $r->fetchColumn();
    } catch (\Throwable $th) {
        return 0;
    }
}

/*============================================================*/
/* Compter les cours par catégorie                            */
/*============================================================*/
function count_cours_by_category($categoryName)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT COUNT(*) FROM Cours WHERE intitule LIKE ?");
        $r->execute(["%" . $categoryName . "%"]);
        return $r->fetchColumn();
    } catch (\Throwable $th) {
        return 0;
    }
}
