<?php
include_once("function_utiles.php");


function get_inscriptions_by_etudiant($idEtudiant)
{
    try {
        $cnx = connecter_db();

        $r = $cnx->prepare(
            "SELECT e.*
             FROM Etudiant e
             JOIN Inscription i ON e.id = i.idEtudiant
             WHERE e.id = ?"
        );

        $r->execute([$idEtudiant]);

        return $r->fetchAll();
    } catch (\Throwable $th) {
        echo "erreur de récupération des inscriptions : " . $th->getMessage();
        return [];
    }
}



/*============================================================*/
/* Compter le nombre total d'étudiants                        */
/*============================================================*/
function count_etudiants()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT COUNT(*) FROM Etudiant");
        $r->execute();
        return $r->fetchColumn();
    } catch (\Throwable $th) {
        return 0;
    }
}


/*============================================================*/
/* Récupérer la croissance des étudiants par mois             */
/*============================================================*/
function get_monthly_student_growth()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("
            SELECT MONTH(dateInscription) as mois, COUNT(DISTINCT idEtudiant) as total
            FROM Inscription
            WHERE YEAR(dateInscription) = YEAR(CURRENT_DATE())
            GROUP BY MONTH(dateInscription)
            ORDER BY mois ASC
        ");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_KEY_PAIR); // Returns [month => count]
    } catch (\Throwable $th) {
        return [];
    }
}

/*============================================================*/
/* Récupérer la répartition par sexe                          */
/*============================================================*/
function get_gender_distribution()
{
    // Since sexe column doesn't exist in current schema, return default values
    // You can add sexe column to Etudiant table if needed
    return ['M' => 0, 'F' => 0];
}
/*============================================================*/
/* Lister tous les étudiants                                  */
/*============================================================*/
function lister_etudiants()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT * FROM Etudiant ORDER BY id DESC");
        $r->execute();
        return $r->fetchAll();
    } catch (\Throwable $th) {
        return [];
    }
}

/*============================================================*/
/* Ajouter un étudiant                                        */
/*============================================================*/
function ajouter_etudiant($cne, $nom, $prenom, $email, $telephone, $dateInscription)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("INSERT INTO Etudiant (cne, nom, prenom, email, telephone, dateInscription) VALUES (?, ?, ?, ?, ?, ?)");
        return $r->execute([$cne, $nom, $prenom, $email, $telephone, $dateInscription]);
    } catch (\Throwable $th) {
        return false;
    }
}

/*============================================================*/
/* Rechercher un étudiant par ID                              */
/*============================================================*/
function find_etudiant_by_id($id)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("SELECT * FROM Etudiant WHERE id = ?");
        $r->execute([$id]);
        return $r->fetch();
    } catch (\Throwable $th) {
        return null;
    }
}

/*============================================================*/
/* Modifier un étudiant                                       */
/*============================================================*/
function modifier_etudiant($cne, $nom, $prenom, $email, $telephone, $dateInscription, $id)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("UPDATE Etudiant SET cne = ?, nom = ?, prenom = ?, email = ?, telephone = ?, dateInscription = ? WHERE id = ?");
        return $r->execute([$cne, $nom, $prenom, $email, $telephone, $dateInscription, $id]);
    } catch (\Throwable $th) {
        return false;
    }
}

/*============================================================*/
/* Supprimer un étudiant                                      */
/*============================================================*/
function supprimer_etudiant($id)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("DELETE FROM Etudiant WHERE id = ?");
        return $r->execute([$id]);
    } catch (\Throwable $th) {
        return false;
    }
}
?>



