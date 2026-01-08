<?php
include_once("../functions/function_professeur.php");
include_once("../functions/function_cours.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index_professeurs.php?error=ID professeur manquant");
    exit();
}

$professeur_id = $_GET['id'];
$professeur = find_professeur_by_id($professeur_id);

if (!$professeur) {
    header("Location: index_professeurs.php?error=Professeur introuvable");
    exit();
}

// Récupérer les cours du professeur
$cours_professeur = [];
try {
    include_once("../functions/function_utiles.php");
    $cnx = connecter_db();
    $r = $cnx->prepare("SELECT * FROM cours WHERE idProf = ? ORDER BY intitule ASC");
    $r->execute([$professeur_id]);
    $cours_professeur = $r->fetchAll();
} catch (\Throwable $th) {
    // Gérer l'erreur silencieusement
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Professeur - Centre de Formation</title>
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

                <!-- Profile Content -->
                <div class="flex-grow-1">
                    <div class="container-fluid p-0" style="max-width: 1000px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold mb-0 text-dark">Profil du professeur</h3>
                            <div class="d-flex gap-2">
                                <a href="modifier_professeur.php?id=<?= $professeur['idProf'] ?>" class="btn btn-outline-primary rounded-pill">
                                    <i class="bi bi-pencil me-2"></i>Modifier
                                </a>
                                <a href="index_professeurs.php" class="btn btn-outline-secondary rounded-pill">
                                    <i class="bi bi-arrow-left me-2"></i>Retour
                                </a>
                            </div>
                        </div>

                        <div class="row g-4">
                            <!-- Informations du professeur -->
                            <div class="col-12 col-lg-4">
                                <div class="card shadow border-0 rounded-4 h-100">
                                    <div class="card-body p-4 text-center">
                                        <div class="mb-4">
                                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($professeur['prenom'] . '+' . $professeur['nom']) ?>&background=0D6EFD&color=fff&size=128"
                                                class="rounded-circle shadow-sm" width="120" height="120" alt="Avatar">
                                        </div>
                                        
                                        <h4 class="fw-bold mb-2"><?= htmlspecialchars($professeur['prenom'] . ' ' . $professeur['nom']) ?></h4>
                                        <p class="text-primary fw-medium mb-4"><?= htmlspecialchars($professeur['specialite']) ?></p>
                                        
                                        <div class="text-start">
                                            <div class="mb-3">
                                                <i class="bi bi-card-text text-muted me-3"></i>
                                                <span><?= htmlspecialchars($professeur['matricule']) ?></span>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <i class="bi bi-envelope text-muted me-3"></i>
                                                <span><?= htmlspecialchars($professeur['email']) ?></span>
                                            </div>
                                            
                                            <?php if (!empty($professeur['telephone'])): ?>
                                            <div class="mb-3">
                                                <i class="bi bi-telephone text-muted me-3"></i>
                                                <span><?= htmlspecialchars($professeur['telephone']) ?></span>
                                            </div>
                                            <?php endif; ?>
                                            
                                            <div class="mb-3">
                                                <i class="bi bi-mortarboard text-muted me-3"></i>
                                                <span><?= htmlspecialchars($professeur['specialite']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cours du professeur -->
                            <div class="col-12 col-lg-8">
                                <div class="card shadow border-0 rounded-4 h-100">
                                    <div class="card-header bg-white border-0 p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="fw-bold mb-0">Cours enseignés</h5>
                                            <span class="badge bg-primary rounded-pill"><?= count($cours_professeur) ?> cours</span>
                                        </div>
                                    </div>
                                    <div class="card-body p-4">
                                        <?php if (empty($cours_professeur)): ?>
                                            <div class="text-center py-5">
                                                <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                                                <p class="text-muted mt-3">Aucun cours assigné pour le moment</p>
                                            </div>
                                        <?php else: ?>
                                            <div class="row g-3">
                                                <?php foreach ($cours_professeur as $cours): ?>
                                                <div class="col-12 col-md-6">
                                                    <div class="card border rounded-3 h-100">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <h6 class="fw-bold mb-0"><?= htmlspecialchars($cours['intitule']) ?></h6>
                                                                <span class="badge bg-light text-secondary"><?= htmlspecialchars($cours['code']) ?></span>
                                                            </div>
                                                            
                                                            <?php if (!empty($cours['description'])): ?>
                                                            <p class="text-muted small mb-3"><?= htmlspecialchars(substr($cours['description'], 0, 100)) ?><?= strlen($cours['description']) > 100 ? '...' : '' ?></p>
                                                            <?php endif; ?>
                                                            
                                                            <div class="row g-0 text-center border-top pt-2">
                                                                <div class="col-6 border-end">
                                                                    <small class="text-muted d-block">Durée</small>
                                                                    <span class="fw-medium"><?= $cours['dureeHeures'] ?>h</span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <small class="text-muted d-block">Prix</small>
                                                                    <span class="fw-medium"><?= number_format($cours['prix'], 2) ?> DH</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
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