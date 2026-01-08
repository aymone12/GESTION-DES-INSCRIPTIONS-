<?php
include_once("../functions/function_etudiant.php");

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cne = $_POST['cne'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $dateInscription = $_POST['dateInscription'];

    modifier_etudiant($cne, $nom, $prenom, $email, $telephone, $dateInscription, $etudiant_id);
    header("Location: index_etudiants.php?success=update");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Étudiant - LMS Admin</title>
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
            <?php $active = 'etudiants'; include_once("../includes/_menu.php"); ?>
            
            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>
                
                <!-- Form Content -->
                <div class="flex-grow-1">
                    <div class="container-fluid p-0" style="max-width: 800px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold mb-0 text-dark">Modifier l'étudiant</h3>
                            <a href="index_etudiants.php" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left me-2"></i>Retour</a>
                        </div>

                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body p-4 p-md-5">
                                <form action="" method="post">
                                    <div class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="cne" class="form-label fw-medium text-secondary">CNE</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="cne" id="cne" value="<?=htmlspecialchars($etudiant['cne'])?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="dateInscription" class="form-label fw-medium text-secondary">Date d'inscription</label>
                                            <input type="date" class="form-control form-control-lg bg-light border-0" name="dateInscription" id="dateInscription" value="<?=$etudiant['dateInscription']?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="nom" class="form-label fw-medium text-secondary">Nom</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="nom" id="nom" value="<?=htmlspecialchars($etudiant['nom'])?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="prenom" class="form-label fw-medium text-secondary">Prénom</label>
                                            <input type="text" class="form-control form-control-lg bg-light border-0" name="prenom" id="prenom" value="<?=htmlspecialchars($etudiant['prenom'])?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="form-label fw-medium text-secondary">Email</label>
                                        <input type="email" class="form-control form-control-lg bg-light border-0" name="email" id="email" value="<?=htmlspecialchars($etudiant['email'])?>" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="telephone" class="form-label fw-medium text-secondary">Téléphone</label>
                                        <input type="tel" class="form-control form-control-lg bg-light border-0" name="telephone" id="telephone" value="<?=htmlspecialchars($etudiant['telephone'])?>">
                                    </div>

                                    <div class="d-flex justify-content-end gap-2 pt-3">
                                        <a href="index_etudiants.php" class="btn btn-light btn-lg rounded-pill px-4">Annuler</a>
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">Enregistrer</button>
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