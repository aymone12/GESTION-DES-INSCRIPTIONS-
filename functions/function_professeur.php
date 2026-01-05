<?php

include_once("function_utiles.php");

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
