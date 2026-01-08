<?php
include_once("../functions/function_etudiant.php");

// Validation de l'ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index_etudiants.php?error=ID étudiant manquant");
    exit();
}

$etudiant_id = $_GET['id'];
$etudiant = find_etudiant_by_id($etudiant_id);

if (!$etudiant) {
    header("Location: index_etudiants.php?error=Étudiant introuvable");
    exit();
}

// Récupérer les cours de cet étudiant
$cours_etudiant = get_cours_by_etudiant($etudiant_id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Étudiant - <?php echo htmlspecialchars($etudiant['nom'] . ' ' . $etudiant['prenom']); ?></title>
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
        .student-header-bg {
            background: linear-gradient(135deg, #28a745, #20c997);
            border-radius: 1rem;
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php $active = 'etudiants'; include_once("../includes/_menu.php"); ?>
            
            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Navbar -->
                <?php include_once("../includes/_navbar.php"); ?>
                
                <!-- Main Content -->
                <div class="flex-grow-1">
                    <!-- Breadcrumb & Actions -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index_etudiants.php" class="text-decoration-none">Étudiants</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($etudiant['cne']); ?></li>
                            </ol>
                        </nav>
                        <div class="d-flex gap-2">
                            <a href="index_etudiants.php" class="btn btn-light border rounded-pill shadow-sm px-3">
                                <i class="bi bi-arrow-left me-2"></i>Retour
                            </a>
                            <a href="modifier_etudiant.php?id=<?php echo $etudiant['id']; ?>" class="btn btn-primary rounded-pill shadow-sm px-3">
                                <i class="bi bi-pencil me-2"></i>Modifier
                            </a>
                        </div>
                    </div>

                    <!-- Student Detail Card -->
                    <div class="card shadow border-0 rounded-4 mb-4 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-md-5 student-header-bg text-white p-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <span class="badge bg-white text-success mb-3 rounded-pill"><?php echo htmlspecialchars($etudiant['cne']); ?></span>
                                        <h2 class="fw-bold mb-2"><?php echo htmlspecialchars($etudiant['nom'] . ' ' . $etudiant['prenom']); ?></h2>
                                        <div class="d-flex align-items-center mt-3">
                                            <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                                                <i class="bi bi-person-fill fs-4"></i>
                                            </div>
                                            <div>
                                                <small class="d-block text-white-50">Inscrit le</small>
                                                <span class="fw-medium"><?php echo date('d/m/Y', strtotime($etudiant['dateInscription'])); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="fw-bold mb-0"><?php echo count($cours_etudiant); ?> Cours</h3>
                                        <small class="text-white-50">Inscriptions actives</small>
                                    </div>
                                </div>
                                <div class="col-md-7 p-4">
                                    <h5 class="fw-bold mb-3">Informations personnelles</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <small class="text-muted d-block text-uppercase mb-1" style="font-size: 0.75rem;">Email</small>
                                            <span class="fw-bold"><?php echo htmlspecialchars($etudiant['email']); ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted d-block text-uppercase mb-1" style="font-size: 0.75rem;">Téléphone</small>
                                            <span class="fw-bold"><?php echo htmlspecialchars($etudiant['telephone'] ?: 'Non renseigné'); ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex gap-4">
                                        <div>
                                            <small class="text-muted d-block text-uppercase mb-1" style="font-size: 0.75rem;">CNE</small>
                                            <span class="fw-bold fs-5"><i class="bi bi-card-text me-2 text-success"></i><?php echo htmlspecialchars($etudiant['cne']); ?></span>
                                        </div>
                                        <div class="vr"></div>
                                        <div>
                                            <small class="text-muted d-block text-uppercase mb-1" style="font-size: 0.75rem;">Statut</small>
                                            <span class="fw-bold fs-5"><i class="bi bi-check-circle me-2 text-success"></i>Actif</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Courses List -->
                    <?php if (count($cours_etudiant) > 0): ?>
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">Cours inscrits (<?php echo count($cours_etudiant); ?>)</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="ps-4 text-uppercase text-muted small">Code</th>
                                            <th scope="col" class="text-uppercase text-muted small">Intitulé</th>
                                            <th scope="col" class="text-uppercase text-muted small">Date inscription</th>
                                            <th scope="col" class="text-uppercase text-muted small">Statut</th>
                                            <th scope="col" class="text-uppercase text-muted small">Note</th>
                                            <th scope="col" class="text-uppercase text-muted small">Durée</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cours_etudiant as $cours): ?>
                                        <tr>
                                            <td class="ps-4">
                                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill"><?php echo htmlspecialchars($cours['code']); ?></span>
                                            </td>
                                            <td class="fw-bold text-dark"><?php echo htmlspecialchars($cours['intitule']); ?></td>
                                            <td class="text-muted"><?php echo date('d/m/Y', strtotime($cours['dateInscription'])); ?></td>
                                            <td>
                                                <?php 
                                                $statut = $cours['statut'] ?: 'En cours';
                                                $badgeClass = 'bg-success';
                                                if ($statut == 'En pause') $badgeClass = 'bg-warning';
                                                if ($statut == 'Terminé') $badgeClass = 'bg-info';
                                                ?>
                                                <span class="badge <?php echo $badgeClass; ?> bg-opacity-10 text-<?php echo str_replace('bg-', '', $badgeClass); ?> rounded-pill"><?php echo htmlspecialchars($statut); ?></span>
                                            </td>
                                            <td class="text-muted"><?php echo $cours['note'] ? htmlspecialchars($cours['note']) . '/20' : 'Non évalué'; ?></td>
                                            <td class="text-muted"><?php echo htmlspecialchars($cours['dureeHeures']); ?>h</td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                            <h5 class="text-muted mt-3">Aucun cours inscrit</h5>
                            <p class="text-muted">Cet étudiant n'est inscrit à aucun cours pour le moment.</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>