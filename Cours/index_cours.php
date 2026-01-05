<?php
include_once("../functions/function_cours.php");
$coursList = all_cours_with_professeur();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours - Centre de Formation</title>
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

        .course-img-overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
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
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Courses Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Catalogue des Cours</h3>
                        <div class="d-flex gap-2">
                            <a href="create_cours.php" class="btn btn-primary rounded-pill shadow-sm py-2 px-3"><i
                                    class="bi bi-plus-lg me-2"></i>Nouveau Cours</a>
                            <div class="dropdown">
                                <button
                                    class="btn btn-white bg-white border rounded-pill shadow-sm py-2 px-3 text-secondary dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-filter me-2"></i>Catégorie
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Développement</a></li>
                                    <li><a class="dropdown-item" href="#">Design</a></li>
                                    <li><a class="dropdown-item" href="#">Marketing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <?php if (count($coursList) > 0): ?>
                            <?php foreach ($coursList as $cours): ?>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="card shadow border-0 rounded-4 h-100 overflow-hidden d-flex flex-column">
                                        <div class="position-relative"
                                            style="height: 160px; background: linear-gradient(135deg, #0d6efd, #0dcaf0);">
                                            <span
                                                class="badge bg-white text-primary position-absolute top-0 start-0 m-3 rounded-pill shadow-sm"><?php echo htmlspecialchars($cours['code']); ?></span>
                                            <div class="position-absolute bottom-0 start-0 w-100 h-50 course-img-overlay"></div>
                                            <h5 class="position-absolute bottom-0 start-0 m-3 text-white fw-bold"><?php echo htmlspecialchars($cours['intitule']); ?>
                                            </h5>
                                        </div>
                                        <div class="card-body d-flex flex-column flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <small class="text-muted"><i class="bi bi-clock me-1"></i><?php echo htmlspecialchars($cours['dureeHeures']); ?>h</small>
                                                <!-- Placeholder validation, assume 4.8 for now -->
                                                <small class="text-warning"><i class="bi bi-star-fill me-1"></i>4.8</small>
                                            </div>
                                            <p class="card-text text-muted small flex-grow-1"><?php echo htmlspecialchars(substr($cours['description'], 0, 100)) . '...'; ?></p>
                                            <div class="d-flex align-items-center mt-3">
                                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($cours['prenomProf'] . '+' . $cours['nomProf']); ?>&background=random"
                                                    class="rounded-circle" width="24" height="24" alt="">
                                                <small class="text-muted ms-2"><?php echo htmlspecialchars($cours['prenomProf'] . ' ' . $cours['nomProf']); ?></small>
                                                <span class="fw-bold text-primary ms-auto"><?php echo htmlspecialchars($cours['prix']); ?> DH</span>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white border-top-0 pt-0 pb-3 d-flex gap-2">
                                            <a href="voir_cours.php?id=<?php echo $cours['idCours']; ?>" class="btn btn-light rounded-circle text-primary shadow-sm p-2" title="Voir">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="modifier_cours.php?id=<?php echo $cours['idCours']; ?>" class="btn btn-light rounded-circle text-warning shadow-sm p-2" title="Modifier">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="delete_cours.php?id=<?php echo $cours['idCours']; ?>" class="btn btn-light rounded-circle text-danger shadow-sm p-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');" title="Supprimer">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-info text-center" role="alert">
                                    Aucun cours trouvé.
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>