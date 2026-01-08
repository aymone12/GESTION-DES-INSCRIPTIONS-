<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Centre de Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* Custom scrollbar for sidebar */
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

        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #6c757d;
        }

        /* Fix dropdown menu styling */
        .dropdown-menu {
            min-width: 150px;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 0.375rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body class="bg-body-tertiary">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php 
            $active = 'dashboard'; 
            include_once("../includes/_menu.php");
            include_once("../functions/function_cours.php");
            include_once("../functions/function_etudiant.php");
            include_once("../functions/function_professeur.php");
            include_once("../functions/function_inscription.php");
            ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Dashboard Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Tableau de Bord</h3>
                        <a href="download_report.php" class="btn btn-primary btn-sm rounded-pill shadow-sm"><i
                                class="bi bi-download me-2"></i>Rapport</a>
                    </div>

                    <!-- Stats Cards -->
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="card shadow border-0 rounded-4 transition-hover h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-4 text-primary">
                                            <i class="bi bi-people fs-4"></i>
                                        </div>

                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Étudiants</h6>
                                    <h2 class="fw-bold mb-0 text-dark"><?= count_etudiants() ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="card shadow border-0 rounded-4 h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="bg-info bg-opacity-10 p-3 rounded-4 text-info">
                                            <i class="bi bi-person-video3 fs-4"></i>
                                        </div>

                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Professeurs</h6>
                                    <h2 class="fw-bold mb-0 text-dark"><?= count_professeurs() ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="card shadow border-0 rounded-4 h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="bg-warning bg-opacity-10 p-3 rounded-4 text-warning">
                                            <i class="bi bi-book fs-4"></i>
                                        </div>

                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Cours</h6>
                                    <h2 class="fw-bold mb-0 text-dark"><?= count_cours() ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="card shadow border-0 rounded-4 h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="bg-danger bg-opacity-10 p-3 rounded-4 text-danger">
                                            <i class="bi bi-graph-up-arrow fs-4"></i>
                                        </div>

                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Revenus</h6>
                                    <h2 class="fw-bold mb-0 text-dark"><?= number_format(calculate_total_revenue(), 2) ?> dh</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- list of etudiant -->
                         <div class="card shadow border-0 rounded-4">
                            <div class="card-header bg-white border-0 py-3">
                                <h5 class="mb-0 fw-bold">Étudiants Récents</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="ps-4 text-muted small text-uppercase">Nom</th>
                                                <th scope="col" class="text-muted small text-uppercase">Email</th>
                                                <th scope="col" class="text-muted small text-uppercase">CNE</th>
                                                <th scope="col" class="text-muted small text-uppercase">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border-top-0">
                                            <?php 
                                                $etudiants_list = lister_etudiants();
                                                $etudiants_list = array_slice($etudiants_list, 0, 5);
                                                if (count($etudiants_list) > 0):
                                                    foreach ($etudiants_list as $etudiant):
                                            ?>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($etudiant['prenom'] . ' ' . $etudiant['nom']) ?>&background=random"
                                                            class="rounded-circle" width="32" height="32" alt="">
                                                        <span class="ms-3 fw-bold text-dark"><?= htmlspecialchars($etudiant['nom'] . ' ' . $etudiant['prenom']) ?></span>
                                                    </div>
                                                </td>
                                                <td class="text-muted"><?= htmlspecialchars($etudiant['email']) ?></td>
                                                <td class="text-muted"><?= htmlspecialchars($etudiant['cne']) ?></td>
                                                <td class="text-muted"><?= date('d M Y', strtotime($etudiant['dateInscription'])) ?></td>
                                            </tr>
                                            <?php 
                                                    endforeach;
                                                else:
                                            ?>
                                            <tr>
                                                <td colspan="4" class="text-center py-4 text-muted">Aucun étudiant</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- Recent Table -->
                    <div class="card shadow border-0 rounded-4">
                        <div
                            class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Dernières Inscriptions</h5>
                            <button class="btn btn-light btn-sm">Voir tout</button>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="ps-4 text-muted small text-uppercase">Étudiant</th>
                                            <th scope="col" class="text-muted small text-uppercase">Cours</th>
                                            <th scope="col" class="text-muted small text-uppercase">Date</th>
                                            <th scope="col" class="text-muted small text-uppercase">Statut</th>
                                            <th scope="col" class="text-end pe-4 text-muted small text-uppercase">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php 
                                            // Ensure function exists to prevent crash if file not reloaded
                                            if(function_exists('get_recent_inscriptions')) {
                                                $inscriptions = get_recent_inscriptions(3); 
                                            } else {
                                                $inscriptions = [];
                                            }
                                        ?>
                                        <?php if (count($inscriptions) > 0): ?>
                                            <?php foreach ($inscriptions as $inscription): ?>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($inscription['prenom'] . ' ' . $inscription['nom']) ?>&background=random"
                                                            class="rounded-circle" width="36" height="36" alt="">
                                                        <div class="ms-3">
                                                            <p class="fw-bold mb-0 text-dark"><?= htmlspecialchars($inscription['nom'] . ' ' . $inscription['prenom']) ?></p>
                                                            <p class="text-muted small mb-0"><?= htmlspecialchars($inscription['email']) ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="fw-medium"><?= htmlspecialchars($inscription['nomCours']) ?></span></td>
                                                <td class="text-muted"><?= date('d M Y', strtotime($inscription['dateInscription'])) ?></td>
                                                <td><span
                                                        class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Confirmé</span>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <div class="d-flex gap-1 justify-content-end">
                                                        <a href="../Inscription/modifier_inscription.php?id=<?= $inscription['idInscription'] ?>" 
                                                           class="btn btn-sm btn-outline-warning rounded-circle" title="Modifier">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="../Inscription/supprimer_inscription.php?id=<?= $inscription['idInscription'] ?>" 
                                                           class="btn btn-sm btn-outline-danger rounded-circle" title="Supprimer"
                                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?')">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center py-4 text-muted">Aucune inscription récente</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Ensure dropdowns work properly
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all dropdowns
            var dropdownElementList = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'));
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
        });
    </script>
</body>

</html>