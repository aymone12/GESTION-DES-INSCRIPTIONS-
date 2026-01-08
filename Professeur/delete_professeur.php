<?php
include_once("../functions/function_professeur.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index_professeurs.php?error=ID professeur manquant");
    exit();
}

$professeur_id = $_GET['id'];
$professeur = find_professeur_by_id($professeur_id);

if (!$professeur) {
    header("Location: index_professeurs.php?error=Professeur introuvable");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        $result = supprimer_professeur($professeur_id);
        
        if ($result === true) {
            header("Location: index_professeurs.php?success=deleted");
            exit();
        } else {
            $error = is_string($result) ? $result : "Erreur lors de la suppression du professeur.";
        }
    } else {
        header("Location: index_professeurs.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un Professeur - Centre de Formation</title>
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
            <?php $active = 'professeurs'; include_once("../includes/_menu.php"); ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Form Content -->
                <div class="flex-grow-1">
                    <div class="container-fluid p-0" style="max-width: 600px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold mb-0 text-dark">Supprimer le professeur</h3>
                            <a href="index_professeurs.php" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left me-2"></i>Retour</a>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-4" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body p-4 p-md-5 text-center">
                                <div class="mb-4">
                                    <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 4rem;"></i>
                                </div>
                                
                                <h4 class="fw-bold mb-3">Confirmer la suppression</h4>
                                
                                <div class="alert alert-light border rounded-3 mb-4">
                                    <h5 class="mb-2"><?= htmlspecialchars($professeur['prenom'] . ' ' . $professeur['nom']) ?></h5>
                                    <p class="text-muted mb-1"><i class="bi bi-card-text me-2"></i><?= htmlspecialchars($professeur['matricule']) ?></p>
                                    <p class="text-muted mb-1"><i class="bi bi-envelope me-2"></i><?= htmlspecialchars($professeur['email']) ?></p>
                                    <p class="text-muted mb-0"><i class="bi bi-mortarboard me-2"></i><?= htmlspecialchars($professeur['specialite']) ?></p>
                                </div>

                                <p class="text-muted mb-4">
                                    Êtes-vous sûr de vouloir supprimer ce professeur ? Cette action est irréversible.
                                </p>

                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="confirm" value="yes">
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="index_professeurs.php" class="btn btn-light btn-lg rounded-pill px-4">Annuler</a>
                                        <button type="submit" class="btn btn-danger btn-lg rounded-pill px-4">
                                            <i class="bi bi-trash me-2"></i>Supprimer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>