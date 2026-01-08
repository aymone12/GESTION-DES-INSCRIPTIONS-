<?php
include_once("../functions/function_utiles.php");
include_once("../functions/function_inscription.php");
include_once("../functions/function_cours.php");
include_once("../functions/function_etudiant.php");

// Récupérer toutes les inscriptions avec les détails
function get_all_inscriptions_with_details()
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare(
            "SELECT i.*, 
                    e.nom, e.prenom, e.email, e.cne,
                    c.intitule, c.code, c.prix
             FROM Inscription i
             JOIN Etudiant e ON i.idEtudiant = e.id
             JOIN Cours c ON i.idCours = c.idCours
             ORDER BY i.dateInscription DESC"
        );
        $r->execute();
        return $r->fetchAll();
    } catch (\Throwable $th) {
        echo "erreur de récupération des inscriptions : " . $th->getMessage();
        return [];
    }
}

$inscriptions = get_all_inscriptions_with_details();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions - Centre de Formation</title>
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

        .dropdown-item.text-danger:hover {
            background-color: #f8d7da;
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

                <!-- Inscriptions Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Gestion des Inscriptions</h3>
                        <div class="d-flex gap-2">
                            <a href="create_inscriptions.php" class="btn btn-primary rounded-pill shadow-sm py-2 px-3">
                                <i class="bi bi-plus-lg me-2"></i>Nouvelle Inscription
                            </a>
                        </div>
                    </div>

                    <!-- Messages de succès/erreur -->
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle"></i>
                            <?php 
                            switch($_GET['success']) {
                                case '1': echo 'Inscription ajoutée avec succès !'; break;
                                case '2': echo 'Inscription modifiée avec succès !'; break;
                                case '3': echo 'Inscription supprimée avec succès !'; break;
                                default: echo 'Opération réussie !';
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle"></i> <?php echo htmlspecialchars($_GET['error']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Filter Tabs -->
                 
                    <ul class="nav nav-pills mb-4 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active rounded-pill shadow-sm" aria-current="page" href="#">Tous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white text-secondary border rounded-pill shadow-sm" href="#">En
                                attente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white text-secondary border rounded-pill shadow-sm"
                                href="#">Confirmés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white text-secondary border rounded-pill shadow-sm"
                                href="#">Annulés</a>
                        </li>
                    </ul>

                    <!-- Inscriptions Table -->
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="ps-4 text-muted small text-uppercase">ID</th>
                                            <th scope="col" class="text-muted small text-uppercase">Étudiant</th>
                                            <th scope="col" class="text-muted small text-uppercase">Cours</th>
                                            <th scope="col" class="text-muted small text-uppercase">Date</th>
                                            <th scope="col" class="text-muted small text-uppercase">Montant</th>
                                            <th scope="col" class="text-muted small text-uppercase">Statut</th>
                                            <th scope="col" class="text-end pe-4 text-muted small text-uppercase">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <?php if (empty($inscriptions)): ?>
                                            <tr>
                                                <td colspan="7" class="text-center py-4 text-muted">
                                                    <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                                    Aucune inscription trouvée
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($inscriptions as $inscription): ?>
                                                <tr>
                                                    <td class="ps-4 fw-bold text-secondary">#<?php echo $inscription['idInscription']; ?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($inscription['nom'] . '+' . $inscription['prenom']); ?>&background=random"
                                                                class="rounded-circle" width="32" height="32" alt="">
                                                            <div class="ms-3">
                                                                <div class="fw-medium"><?php echo htmlspecialchars($inscription['nom'] . ' ' . $inscription['prenom']); ?></div>
                                                                <small class="text-muted"><?php echo htmlspecialchars($inscription['email']); ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fw-medium"><?php echo htmlspecialchars($inscription['intitule']); ?></div>
                                                        <small class="text-muted"><?php echo htmlspecialchars($inscription['code']); ?></small>
                                                    </td>
                                                    <td class="text-muted"><?php echo date('d M Y', strtotime($inscription['dateInscription'])); ?></td>
                                                    <td class="fw-bold"><?php echo number_format($inscription['prix'], 0, ',', ' '); ?> dh</td>
                                                    <td>
                                                        <?php
                                                        $badgeClass = '';
                                                        switch(strtolower($inscription['statut'])) {
                                                            case 'en cours':
                                                                $badgeClass = 'bg-primary bg-opacity-10 text-primary';
                                                                break;
                                                            case 'terminé':
                                                                $badgeClass = 'bg-success bg-opacity-10 text-success';
                                                                break;
                                                            case 'abandonné':
                                                                $badgeClass = 'bg-danger bg-opacity-10 text-danger';
                                                                break;
                                                            case 'en attente':
                                                                $badgeClass = 'bg-warning bg-opacity-10 text-warning';
                                                                break;
                                                            default:
                                                                $badgeClass = 'bg-secondary bg-opacity-10 text-secondary';
                                                        }
                                                        ?>
                                                        <span class="badge <?php echo $badgeClass; ?> rounded-pill px-3">
                                                            <?php echo htmlspecialchars($inscription['statut']); ?>
                                                        </span>
                                                        <?php if ($inscription['note'] !== null): ?>
                                                            <div class="small text-muted mt-1">Note: <?php echo $inscription['note']; ?>/20</div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-end pe-4">
                                                        <a href="modifier_inscription.php?id=<?php echo $inscription['idInscription']; ?>" class="btn btn-sm btn-outline-warning rounded-circle" title="Modifier">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="supprimer_inscription.php?id=<?php echo $inscription['idInscription']; ?>" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?')" title="Supprimer">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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