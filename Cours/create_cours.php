<?php
include_once("../functions/function_cours.php");
include_once("../functions/function_professeur.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProf = $_POST['idProf'];
    $code = $_POST['code'];
    $intitule = $_POST['intitule'];
    $description = $_POST['description'];
    $dureeHeures = $_POST['dureeHeures'];
    $prix = $_POST['prix'];

    if (!empty($idProf) && !empty($code) && !empty($intitule) && !empty($dureeHeures) && !empty($prix)) {
        ajouter_cours($idProf, $code, $intitule, $description, $dureeHeures, $prix);
        header("Location: create_cours.php?success=1");
        exit();
    } else {
        $error = "Veuillez remplir tous les champs obligatoires.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Cours - LMS Admin</title>
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
                            <h3 class="fw-bold mb-0 text-dark">Ajouter un nouveau cours</h3>
                            <a href="index_cours.php" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left me-2"></i>Retour</a>
                        </div>

                        <?php if (isset($_GET['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>Cours ajouté avec succès !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-4" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body p-4 p-md-5">
                                <form action="" method="post">
                                    <div class="mb-4">
                                        <label for="idProf" class="form-label fw-medium text-secondary">Professeur</label>
                                        <select class="form-select form-select-lg bg-light border-0" name="idProf" id="idProf" required>
                                            <option value="">Sélectionner un professeur...</option>
                                            <?php
                                            $professeurs = all_professeurs();
                                            foreach ($professeurs as $professeur) {
                                                echo "<option value=\"" . $professeur['idProf'] . "\">" . htmlspecialchars($professeur['nom'] . " " . $professeur['prenom']) . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="code" class="form-label fw-medium text-secondary">Code du cours</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="code" id="code" placeholder="Ex: CS101" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="intitule" class="form-label fw-medium text-secondary">Intitulé</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="intitule" id="intitule" placeholder="Ex: Introduction à la programmation" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="form-label fw-medium text-secondary">Description</label>
                                        <textarea class="form-control bg-light border-0" name="description" id="description" rows="4" placeholder="Description détaillée du cours..."></textarea>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="dureeHeures" class="form-label fw-medium text-secondary">Durée (heures)</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-lg bg-light border-0" name="dureeHeures" id="dureeHeures" min="1" required>
                                                <span class="input-group-text bg-light border-0 text-muted">H</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="prix" class="form-label fw-medium text-secondary">Prix</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control form-control-lg bg-light border-0" name="prix" id="prix" required>
                                                <span class="input-group-text bg-light border-0 text-muted">DH</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end gap-2 pt-3">
                                        <a href="cours.html" class="btn btn-light btn-lg rounded-pill px-4">Annuler</a>
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">Créer le cours</button>
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