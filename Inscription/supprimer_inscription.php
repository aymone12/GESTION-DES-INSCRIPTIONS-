<?php
include_once("../functions/function_utiles.php");
include_once("../functions/function_inscription.php");
include_once("../functions/function_cours.php");
include_once("../functions/function_etudiant.php");

// Récupérer l'ID de l'inscription
$idInscription = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($idInscription <= 0) {
    header("Location: index_inscriptions.php?error=" . urlencode("ID d'inscription invalide"));
    exit();
}

// Récupérer les détails de l'inscription
function get_inscription_by_id($idInscription)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare(
            "SELECT i.*, e.nom, e.prenom, e.email, c.intitule, c.code
             FROM Inscription i
             JOIN Etudiant e ON i.idEtudiant = e.id
             JOIN Cours c ON i.idCours = c.idCours
             WHERE i.idInscription = ?"
        );
        $r->execute([$idInscription]);
        return $r->fetch();
    } catch (\Throwable $th) {
        echo "erreur de récupération de l'inscription : " . $th->getMessage();
        return null;
    }
}

$inscription = get_inscription_by_id($idInscription);

if (!$inscription) {
    header("Location: index_inscriptions.php?error=" . urlencode("Inscription non trouvée"));
    exit();
}

// Traitement de la suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    try {
        supprimer_inscription($idInscription);
        header("Location: index_inscriptions.php?success=3");
        exit();
    } catch (Exception $ex) {
        $error = "Erreur lors de la suppression de l'inscription : " . $ex->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une Inscription - Centre de Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: #212529;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #495057;
            border-radius: 3px;
        }
    </style>
</head>
<body class="bg-body-tertiary">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php $active = 'inscriptions'; include_once("../includes/_menu.php"); ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Form Content -->
                <div class="flex-grow-1">
                    <div class="card shadow-sm border-danger">
                        <div class="card-header bg-danger bg-opacity-10 border-danger">
                            <h5 class="card-title mb-0 text-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Supprimer l'inscription #<?php echo $inscription['idInscription']; ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Display error message if set -->
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger">
                                    <i class="bi bi-exclamation-triangle"></i> <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                <strong>Attention !</strong> Cette action est irréversible. Vous êtes sur le point de supprimer définitivement cette inscription.
                            </div>

                            <!-- Détails de l'inscription -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="mb-0">Détails de l'inscription</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>ID Inscription:</strong> #<?php echo $inscription['idInscription']; ?></p>
                                            <p><strong>Étudiant:</strong> <?php echo htmlspecialchars($inscription['nom'] . ' ' . $inscription['prenom']); ?></p>
                                            <p><strong>Email:</strong> <?php echo htmlspecialchars($inscription['email']); ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Cours:</strong> <?php echo htmlspecialchars($inscription['intitule']); ?></p>
                                            <p><strong>Code cours:</strong> <?php echo htmlspecialchars($inscription['code']); ?></p>
                                            <p><strong>Date d'inscription:</strong> <?php echo date('d/m/Y', strtotime($inscription['dateInscription'])); ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Statut:</strong> 
                                                <span class="badge bg-secondary"><?php echo htmlspecialchars($inscription['statut']); ?></span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Note:</strong> 
                                                <?php echo $inscription['note'] !== null ? $inscription['note'] . '/20' : 'Non évaluée'; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="supprimer_inscription.php?id=<?php echo $idInscription; ?>">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="confirm_checkbox" required>
                                        <label class="form-check-label" for="confirm_checkbox">
                                            Je confirme vouloir supprimer définitivement cette inscription
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <button type="submit" name="confirm_delete" class="btn btn-danger" id="delete_btn" disabled>
                                        <i class="bi bi-trash"></i> Supprimer définitivement
                                    </button>
                                    <a href="index_inscriptions.php" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Annuler et retourner
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activer/désactiver le bouton de suppression selon la checkbox
        document.getElementById('confirm_checkbox').addEventListener('change', function() {
            document.getElementById('delete_btn').disabled = !this.checked;
        });
    </script>
</body> 
</html>