<?php
include_once("../functions/function_professeur.php");

$professeurs = all_professeurs();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professeurs - Centre de Formation</title>
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
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Professors Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Nos Professeurs</h3>
                        <div class="d-flex gap-2">
                            <a href="create_professeur.php" class="btn btn-primary rounded-pill shadow-sm py-2 px-3">
                                <i class="bi bi-plus-lg me-2"></i>Ajouter
                            </a>
                        </div>
                    </div>

                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4 mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <?php 
                            if ($_GET['success'] == 'deleted') {
                                echo 'Professeur supprimé avec succès !';
                            } elseif ($_GET['success'] == 'modified') {
                                echo 'Professeur modifié avec succès !';
                            } else {
                                echo 'Opération effectuée avec succès !';
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-4 mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo htmlspecialchars($_GET['error']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Professors Grid -->
                    <div class="row g-4">
                        <?php if (empty($professeurs)): ?>
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <i class="bi bi-person-plus text-muted" style="font-size: 4rem;"></i>
                                    <h4 class="text-muted mt-3">Aucun professeur</h4>
                                    <p class="text-muted">Commencez par ajouter votre premier professeur</p>
                                    <a href="create_professeur.php" class="btn btn-primary rounded-pill">
                                        <i class="bi bi-plus-lg me-2"></i>Ajouter un professeur
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($professeurs as $professeur): ?>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="card shadow border-0 rounded-4 h-100 text-center p-3 transition-hover">
                                    <div class="card-body">
                                        <div class="position-relative d-inline-block mb-3">
                                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($professeur['prenom'] . '+' . $professeur['nom']) ?>&background=0D6EFD&color=fff&size=128"
                                                class="rounded-circle shadow-sm" width="96" height="96" alt="Avatar">
                                            <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-white rounded-circle"></span>
                                        </div>
                                        <h5 class="fw-bold mb-1"><?= htmlspecialchars($professeur['prenom'] . ' ' . $professeur['nom']) ?></h5>
                                        <p class="text-muted small mb-3"><?= htmlspecialchars($professeur['specialite']) ?></p>
                                        
                                        <?php if (!empty($professeur['email'])): ?>
                                        <div class="mb-3">
                                            <small class="text-muted"><i class="bi bi-envelope me-1"></i><?= htmlspecialchars($professeur['email']) ?></small>
                                        </div>
                                        <?php endif; ?>

                                        <?php
                                        // Compter les cours du professeur
                                        try {
                                            include_once("../functions/function_utiles.php");
                                            $cnx = connecter_db();
                                            $r = $cnx->prepare("SELECT COUNT(*) as count FROM cours WHERE idProf = ?");
                                            $r->execute([$professeur['idProf']]);
                                            $cours_count = $r->fetch()['count'];
                                        } catch (\Throwable $th) {
                                            $cours_count = 0;
                                        }
                                        ?>

                                        <div class="row g-0 border-top pt-3 mb-3">
                                            <div class="col-12">
                                                <h6 class="fw-bold mb-0 text-dark"><?= $cours_count ?></h6>
                                                <small class="text-muted" style="font-size: 0.75rem;">Cours</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-0 pt-0 pb-3">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="voir_professeur.php?id=<?= $professeur['idProf'] ?>" class="btn btn-outline-primary btn-sm rounded-pill flex-fill">
                                                <i class="bi bi-eye me-1"></i>Voir
                                            </a>
                                            <a href="modifier_professeur.php?id=<?= $professeur['idProf'] ?>" class="btn btn-outline-warning btn-sm rounded-pill">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="delete_professeur.php?id=<?= $professeur['idProf'] ?>" class="btn btn-outline-danger btn-sm rounded-pill">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
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