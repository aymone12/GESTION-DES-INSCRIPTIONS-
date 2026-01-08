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
            "SELECT i.*, e.nom, e.prenom, c.intitule
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

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idEtudiant = isset($_POST['idEtudiant']) ? (int)$_POST['idEtudiant'] : 0;
    $idCours = isset($_POST['idCours']) ? (int)$_POST['idCours'] : 0;
    $dateInscription = $_POST['dateInscription'];
    $statut = isset($_POST['statut']) ? htmlspecialchars(trim($_POST['statut'])) : '';
    $note = isset($_POST['note']) && $_POST['note'] !== '' ? (float)$_POST['note'] : null;

    // Validate required fields
    if ($idEtudiant <= 0) {
        $error = "Veuillez sélectionner un étudiant.";
    } elseif ($idCours <= 0) {
        $error = "Veuillez sélectionner un cours.";
    } elseif (empty($dateInscription)) {
        $error = "La date d'inscription est requise.";
    } elseif (empty($statut)) {
        $error = "Le statut est requis.";
    } else {
        // Validate date
        $d = DateTime::createFromFormat('Y-m-d', $dateInscription);
        if (!$d || $d->format('Y-m-d') !== $dateInscription) {
            $error = "La date d'inscription n'est pas valide.";
        }

        // Validate note: allow empty or a valid float between 0 and 20
        if ($note !== null && ($note < 0 || $note > 20)) {
            $error = "La note doit être entre 0 et 20.";
        }

        // Check if student is already enrolled in this course (excluding current inscription)
        if (!isset($error)) {
            try {
                $cnx = connecter_db();
                $checkQuery = $cnx->prepare("SELECT COUNT(*) FROM Inscription WHERE idEtudiant = ? AND idCours = ? AND idInscription != ?");
                $checkQuery->execute([$idEtudiant, $idCours, $idInscription]);
                $count = $checkQuery->fetchColumn();
                
                if ($count > 0) {
                    $error = "Cet étudiant est déjà inscrit à ce cours.";
                }
            } catch (Exception $ex) {
                $error = "Erreur lors de la vérification : " . $ex->getMessage();
            }
        }
    }

    if (!isset($error)) {
        try {
            modifier_inscription($idEtudiant, $idCours, $dateInscription, $statut, $note, $idInscription);
            header("Location: index_inscriptions.php?success=2");
            exit();
        } catch (Exception $ex) {
            $error = "Erreur lors de la modification de l'inscription : " . $ex->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Inscription - Centre de Formation</title>
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
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-pencil-square me-2"></i>
                                Modifier l'inscription #<?php echo $inscription['idInscription']; ?>
                            </h5>
                            <small class="text-muted">
                                Étudiant: <?php echo htmlspecialchars($inscription['nom'] . ' ' . $inscription['prenom']); ?> - 
                                Cours: <?php echo htmlspecialchars($inscription['intitule']); ?>
                            </small>
                        </div>
                        <div class="card-body">
                            <!-- Display error message if set -->
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger">
                                    <i class="bi bi-exclamation-triangle"></i> <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            
                            <form method="POST" action="modifier_inscription.php?id=<?php echo $idInscription; ?>">
                                <div class="mb-3">
                                    <label for="idEtudiant" class="form-label">Étudiant</label>
                                    <select class="form-select" id="idEtudiant" name="idEtudiant" required>
                                        <option value="" disabled>Choisir un étudiant</option>
                                        <?php
                                        $etudiants = lister_etudiants();
                                        $selectedEtudiant = isset($_POST['idEtudiant']) ? $_POST['idEtudiant'] : $inscription['idEtudiant'];
                                        foreach ($etudiants as $etudiant):
                                            $selected = ($etudiant['id'] == $selectedEtudiant) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $etudiant['id']; ?>" <?php echo $selected; ?>>
                                                <?php echo htmlspecialchars($etudiant['nom'] . ' ' . $etudiant['prenom']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="idCours" class="form-label">Cours</label>
                                    <select class="form-select" id="idCours" name="idCours" required>
                                        <option value="" disabled>Choisir un cours</option>
                                        <?php
                                        $coursList = all_cours();
                                        $selectedCours = isset($_POST['idCours']) ? $_POST['idCours'] : $inscription['idCours'];
                                        foreach ($coursList as $cours):
                                            $selected = ($cours['idCours'] == $selectedCours) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $cours['idCours']; ?>" <?php echo $selected; ?>>
                                                <?php echo htmlspecialchars($cours['intitule']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="dateInscription" class="form-label">Date d'Inscription</label>
                                    <input type="date" class="form-control" id="dateInscription" name="dateInscription" 
                                           value="<?php echo isset($_POST['dateInscription']) ? htmlspecialchars($_POST['dateInscription']) : $inscription['dateInscription']; ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="statut" class="form-label">Statut</label>
                                    <select class="form-select" id="statut" name="statut" required>
                                        <option value="" disabled>Choisir un statut</option>
                                        <?php
                                        $statuts = ['En cours', 'Terminé', 'Abandonné', 'En attente'];
                                        $selectedStatut = isset($_POST['statut']) ? $_POST['statut'] : $inscription['statut'];
                                        foreach ($statuts as $statutOption):
                                            $selected = ($statutOption == $selectedStatut) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo htmlspecialchars($statutOption); ?>" <?php echo $selected; ?>>
                                                <?php echo htmlspecialchars($statutOption); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="note" class="form-label">Note (optionnel, entre 0 et 20)</label>
                                    <input type="number" step="0.01" min="0" max="20" class="form-control" id="note" name="note" 
                                           value="<?php echo isset($_POST['note']) ? htmlspecialchars($_POST['note']) : ($inscription['note'] ?? ''); ?>" 
                                           placeholder="Laisser vide si pas encore évalué">
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle"></i> Modifier l'Inscription
                                    </button>
                                    <a href="index_inscriptions.php" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Retour à la liste
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
</body> 
</html>