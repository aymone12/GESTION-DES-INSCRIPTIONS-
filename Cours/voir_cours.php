<?php
include_once("../functions/function_cours.php");
include_once("../functions/function_professeur.php");

// Validation de l'ID
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

// Récupérer le professeur pour ce cours
$professeur = get_professeur_by_cours($cours_id);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Cours - <?php echo htmlspecialchars($cours['intitule']); ?></title>
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

        .course-header-bg {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            border-radius: 1rem;
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
                <!-- Navbar -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Main Content -->
                <div class="flex-grow-1">
                    <!-- Breadcrumb & Actions -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index_cours.php" class="text-decoration-none">Cours</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($cours['code']); ?></li>
                            </ol>
                        </nav>
                        <div class="d-flex gap-2">
                            <a href="index_cours.php" class="btn btn-light border rounded-pill shadow-sm px-3">
                                <i class="bi bi-arrow-left me-2"></i>Retour
                            </a>
                            <a href="modifier_cours.php?id=<?php echo $cours['idCours']; ?>" class="btn btn-primary rounded-pill shadow-sm px-3">
                                <i class="bi bi-pencil me-2"></i>Modifier
                            </a>
                        </div>
                    </div>

                    <!-- Course Detail Card -->
                    <div class="card shadow border-0 rounded-4 mb-4 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-md-5 course-header-bg text-white p-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <span class="badge bg-white text-primary mb-3 rounded-pill"><?php echo htmlspecialchars($cours['code']); ?></span>
                                        <h2 class="fw-bold mb-2"><?php echo htmlspecialchars($cours['intitule']); ?></h2>
                                        <div class="d-flex align-items-center mt-3">
                                            <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                                                <i class="bi bi-person-fill fs-4"></i>
                                            </div>
                                            <div>
                                                <small class="d-block text-white-50">Enseigné par</small>
                                                <span class="fw-medium"><?php echo htmlspecialchars($cours['prenomProf'] . ' ' . $cours['nomProf']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="fw-bold mb-0"><?php echo htmlspecialchars($cours['prix']); ?> DH</h3>
                                    </div>
                                </div>
                                <div class="col-md-7 p-4">
                                    <h5 class="fw-bold mb-3">Description</h5>
                                    <p class="text-secondary leading-relaxed">
                                        <?php echo nl2br(htmlspecialchars($cours['description'])); ?>
                                    </p>
                                    <hr>
                                    <div class="d-flex gap-4">
                                        <div>
                                            <small class="text-muted d-block text-uppercase mb-1" style="font-size: 0.75rem;">Durée</small>
                                            <span class="fw-bold fs-5"><i class="bi bi-clock me-2 text-primary"></i><?php echo htmlspecialchars($cours['dureeHeures']); ?>h</span>
                                        </div>
                                        <div class="vr"></div>
                                        <div>
                                            <small class="text-muted d-block text-uppercase mb-1" style="font-size: 0.75rem;">Niveau</small>
                                            <span class="fw-bold fs-5"><i class="bi bi-bar-chart me-2 text-primary"></i>Intermédiaire</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Professor Details (Foreach Loop as requested) -->
                    <?php if ($professeur): ?>
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">Détails du Professeur</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <?php 
                                // Fields to display
                                $displayFields = [
                                    'Nom' => $professeur['nom'],
                                    'Prénom' => $professeur['prenom'],
                                    'Email' => $professeur['email'],
                                    'Téléphone' => $professeur['telephone'],
                                    'Spécialité' => $professeur['specialite']
                                ];
                                
                                foreach ($displayFields as $label => $value): 
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;"><?php echo $label; ?></small>
                                        <div class="mt-1 fw-bold text-dark"><?php echo htmlspecialchars($value); ?></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
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
