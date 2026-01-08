<?php

include_once("function_utiles.php");

/*============================================================*/
/* Ajouter un professeur                                      */
/*============================================================*/
function ajouter_professeur($matricule, $nom, $prenom, $email, $telephone, $specialite)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("INSERT INTO Professeur (matricule, nom, prenom, email, telephone, specialite) VALUES (?, ?, ?, ?, ?, ?)");
        return $r->execute([$matricule, $nom, $prenom, $email, $telephone, $specialite]);
    } catch (\Throwable $th) {
        echo "erreur d'ajout du professeur : " . $th->getMessage();
        return false;
    }
}

/*============================================================*/
/* Trouver un professeur par ID                               */
/*============================================================*/
function find_professeur_by_id($idProf)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT * FROM Professeur WHERE idProf = ?");
        $r->execute([$idProf]);
        return $r->fetch();
    } catch (\Throwable $th) {
        echo "erreur de sélection du professeur : " . $th->getMessage();
        return null;
    }
}

/*============================================================*/
/* Modifier un professeur                                     */
/*============================================================*/
function modifier_professeur($matricule, $nom, $prenom, $email, $telephone, $specialite, $idProf)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("UPDATE Professeur SET matricule = ?, nom = ?, prenom = ?, email = ?, telephone = ?, specialite = ? WHERE idProf = ?");
        return $r->execute([$matricule, $nom, $prenom, $email, $telephone, $specialite, $idProf]);
    } catch (\Throwable $th) {
        echo "erreur de mise à jour du professeur : " . $th->getMessage();
        return false;
    }
}

/*============================================================*/
/* Supprimer un professeur                                    */
/*============================================================*/
function supprimer_professeur($idProf)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("DELETE FROM Professeur WHERE idProf = ?");
        return $r->execute([$idProf]);
    } catch (\Throwable $th) {
        echo "erreur de suppression du professeur : " . $th->getMessage();
        return false;
    }
}

/*============================================================*/
/* Récupérer tous les professeurs                             */
/*============================================================*/
function all_professeurs()
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare("SELECT * FROM Professeur ORDER BY nom ASC, prenom ASC");
        $r->execute();

        return $r->fetchAll();
    } catch (\Throwable $th) {
        echo "erreur de sélection des professeurs : " . $th->getMessage();
        return [];
    }
}

/*============================================================*/
/* Récupérer le professeur d'un cours                         */
/*============================================================*/
function get_professeur_by_cours($idCours)
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare(
            "SELECT p.* 
             FROM Professeur p
             JOIN Cours c ON p.idProf = c.idProf
             WHERE c.idCours = ?"
        );
        $r->execute([$idCours]);

        return $r->fetch(); // Retourne un seul professeur (tableau associatif)
    } catch (\Throwable $th) {
        echo "erreur de sélection du professeur : " . $th->getMessage();
        return null;
    }
}

/*============================================================*/
/* Compter le nombre total de professeurs                     */
/*============================================================*/
function count_professeurs()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT COUNT(*) FROM Professeur");
        $r->execute();
        return $r->fetchColumn();
    } catch (\Throwable $th) {
        return 0;
    }
}

?>
