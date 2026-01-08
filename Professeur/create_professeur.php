<?php
include_once("../functions/function_professeur.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $specialite = $_POST['specialite'];

    if (!empty($matricule) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($specialite)) {
        $result = ajouter_professeur($matricule, $nom, $prenom, $email, $telephone, $specialite);
        if ($result) {
            header("Location: create_professeur.php?success=1");
            exit();
        } else {
            $error = "Erreur lors de l'ajout du professeur.";
        }
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
    <title>Ajouter un Professeur - Centre de Formation</title>
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
                    <div class="container-fluid p-0" style="max-width: 800px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold mb-0 text-dark">Ajouter un nouveau professeur</h3>
                            <a href="index_professeurs.php" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left me-2"></i>Retour</a>
                        </div>

                        <?php if (isset($_GET['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>Professeur ajouté avec succès !
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
                                        <label for="matricule" class="form-label fw-medium text-secondary">Matricule *</label>
                                        <input type="text" class="form-control form-control-lg bg-light border-0" name="matricule" id="matricule" placeholder="Ex: PROF001" required>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="nom" class="form-label fw-medium text-secondary">Nom *</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="nom" id="nom" placeholder="Ex: Dubois" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="prenom" class="form-label fw-medium text-secondary">Prénom *</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="prenom" id="prenom" placeholder="Ex: Marc" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="form-label fw-medium text-secondary">Email *</label>
                                        <input type="email" class="form-control form-control-lg bg-light border-0" name="email" id="email" placeholder="Ex: marc.dubois@email.com" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="telephone" class="form-label fw-medium text-secondary">Téléphone</label>
                                        <input type="tel" class="form-control form-control-lg bg-light border-0" name="telephone" id="telephone" placeholder="Ex: 06 12 34 56 78">
                                    </div>

                                    <div class="mb-4">
                                        <label for="specialite" class="form-label fw-medium text-secondary">Spécialité *</label>
                                        <input type="text" class="form-control form-control-lg bg-light border-0" name="specialite" id="specialite" placeholder="Ex: Développement Web, Data Science..." required>
                                    </div>

                                    <div class="d-flex justify-content-end gap-2 pt-3">
                                        <a href="index_professeurs.php" class="btn btn-light btn-lg rounded-pill px-4">Annuler</a>
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">Ajouter le professeur</button>
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