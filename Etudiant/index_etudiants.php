<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiants - Centre de Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>

<?php
include_once("../functions/function_etudiant.php");

$etudiants = lister_etudiants();
?>
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
            <?php 
                include_once("../includes/_menu.php"); 
                include_once("../functions/function_etudiant.php");
                $etudiants = lister_etudiants();
            ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Students Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Gestion des Étudiants</h3>
                        <div class="d-flex gap-2">
                            <a href="create_etudiants.php" class="btn btn-primary rounded-pill shadow-sm py-2 px-3"><i
                                    class="bi bi-plus-lg me-2"></i>Ajouter</a>
                        </div>
                    </div>

                    <!-- Students Table -->
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="ps-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="selectAll">
                                                </div>
                                            </th>
                                            <th scope="col" class="text-uppercase text-muted small">Étudiant</th>
                                            <th scope="col" class="text-uppercase text-muted small">Email</th>
                                            <th scope="col" class="text-uppercase text-muted small">Téléphone</th>
                                            <th scope="col" class="text-uppercase text-muted small">Cours</th>
                                            <th scope="col" class="text-uppercase text-muted small">Date</th>
                                            <th scope="col" class="text-uppercase text-muted small">Statut</th>
                                            <th scope="col" class="text-end pe-4 text-uppercase text-muted small">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php foreach ($etudiants as $etudiant) { ?>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($etudiant['nom'] . ' ' . $etudiant['prenom']); ?>&background=0D6EFD&color=fff"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <span class="ms-3 fw-bold text-dark"><?= $etudiant['nom'] . ' ' . $etudiant['prenom']; ?></span>
                                                </div>
                                            </td>
                                            <td class="text-muted"><?= $etudiant['email'] ?? 'N/A'; ?></td>
                                            <td class="text-muted"><?= $etudiant['telephone'] ?? 'N/A'; ?></td>
                                            <td class="text-muted">0</td>
                                            <td class="text-muted"><?= $etudiant['dateInscription'] ?? '-'; ?></td>
                                            <td>
                                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Actif</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <a href="modifier_etudiants.php?id=<?= $etudiant['id']; ?>" class="btn btn-sm btn-light rounded-circle me-1">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-sm btn-light rounded-circle text-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>