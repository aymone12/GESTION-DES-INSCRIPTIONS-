<?php
include_once("../functions/function_cours.php");
include_once("../functions/function_professeur.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index_cours.php?error=ID cours manquant");
    exit();
}

$cours_id = $_GET['id'];
$cours = find_cours_by_id($cours_id);

if (!$cours) {
    header("Location: index_cours.php?error=Cours introuvable");
    exit();
}

$professeurs = all_professeurs();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Cours - LMS Admin</title>
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
            <?php $active = 'cours'; include_once("../includes/_menu.php"); ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Form Content -->
                <div class="flex-grow-1">
                    <div class="container-fluid p-0" style="max-width: 800px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold mb-0 text-dark">Modifier le cours</h3>
                            <a href="index_cours.php" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left me-2"></i>Retour</a>
                        </div>

                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body p-4 p-md-5">
                                <form action="update_cours.php" method="post">
                                    <input type="hidden" name="id" value="<?=$cours['idCours']?>">
                                    <div class="mb-4">
                                        <label for="idProf" class="form-label fw-medium text-secondary">Professeur</label>
                                        <select class="form-select form-select-lg bg-light border-0" name="idProf" id="idProf" required>
                                            <option value="">Sélectionner un professeur...</option>
                                            <?php foreach ($professeurs as $prof): ?>
                                                <option value="<?=$prof['idProf']?>" <?= ($prof['idProf'] == $cours['idProf']) ? 'selected' : '' ?>>
                                                    <?=$prof['nom']?> <?=$prof['prenom']?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="code" class="form-label fw-medium text-secondary">Code du cours</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="code" id="code" value="<?=$cours['code']?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="intitule" class="form-label fw-medium text-secondary">Intitulé</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="intitule" id="intitule" value="<?=$cours['intitule']?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="form-label fw-medium text-secondary">Description</label>
                                        <textarea class="form-control bg-light border-0" name="description" id="description" rows="4"><?=$cours['description']?></textarea>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="dureeHeures" class="form-label fw-medium text-secondary">Durée (heures)</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-lg bg-light border-0" name="dureeHeures" id="dureeHeures" min="1" value="<?=$cours['dureeHeures']?>" required>
                                                <span class="input-group-text bg-light border-0 text-muted">H</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="prix" class="form-label fw-medium text-secondary">Prix</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control form-control-lg bg-light border-0" name="prix" id="prix" value="<?=$cours['prix']?>" required>
                                                <span class="input-group-text bg-light border-0 text-muted">DH</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end gap-2 pt-3">
                                        <a href="index_cours.php" class="btn btn-light btn-lg rounded-pill px-4">Annuler</a>
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">Enregistrer</button>
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