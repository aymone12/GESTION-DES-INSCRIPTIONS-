<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - Centre de Formation</title>
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
            <?php $active = 'statistiques'; include_once("../includes/_menu.php"); ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Statistics Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Rapports & Statistiques</h3>
                        <div class="btn-group shadow-sm rounded-pill" role="group">
                            <button type="button" class="btn btn-primary rounded-start-pill text-white">Mensuel</button>
                            <button type="button" class="btn btn-light border">Trimestriel</button>
                            <button type="button" class="btn btn-light rounded-end-pill border">Annuel</button>
                        </div>
                    </div>

                    <!-- KPI Cards Details -->
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-md-4">
                            <div class="card shadow border-0 rounded-4 h-100 bg-primary bg-gradient text-white">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-4">
                                        <div>
                                            <h6 class="text-white text-opacity-75 text-uppercase fw-bold mb-1">Total
                                                Revenus</h6>
                                            <h2 class="fw-bold mb-0">45,230 €</h2>
                                        </div>
                                        <div class="bg-white bg-opacity-25 p-3 rounded-4">
                                            <i class="bi bi-wallet2 fs-3"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-white text-success rounded-pill me-2"><i
                                                class="bi bi-arrow-up"></i> +12%</span>
                                        <small class="text-white text-opacity-75">vs mois dernier</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card shadow border-0 rounded-4 h-100 bg-success bg-gradient text-white">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-4">
                                        <div>
                                            <h6 class="text-white text-opacity-75 text-uppercase fw-bold mb-1">Total
                                                Inscriptions</h6>
                                            <h2 class="fw-bold mb-0">1,450</h2>
                                        </div>
                                        <div class="bg-white bg-opacity-25 p-3 rounded-4">
                                            <i class="bi bi-pencil-square fs-3"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-white text-success rounded-pill me-2"><i
                                                class="bi bi-arrow-up"></i> +5.4%</span>
                                        <small class="text-white text-opacity-75">vs mois dernier</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card shadow border-0 rounded-4 h-100 bg-info bg-gradient text-white">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-4">
                                        <div>
                                            <h6 class="text-white text-opacity-75 text-uppercase fw-bold mb-1">Taux de
                                                Complétion</h6>
                                            <h2 class="fw-bold mb-0">87%</h2>
                                        </div>
                                        <div class="bg-white bg-opacity-25 p-3 rounded-4">
                                            <i class="bi bi-trophy fs-3"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-white text-success rounded-pill me-2"><i
                                                class="bi bi-arrow-up"></i> +2%</span>
                                        <small class="text-white text-opacity-75">vs mois dernier</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-lg-8">
                            <div class="card shadow border-0 rounded-4 h-100">
                                <div
                                    class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 fw-bold">Croissance des Étudiants</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Simple CSS Bar Chart Placeholder -->
                                    <div class="d-flex align-items-end justify-content-around h-100"
                                        style="min-height: 300px;">
                                        <div class="text-center w-100">
                                            <div class="bg-primary bg-opacity-25 rounded-top w-50 mx-auto"
                                                style="height: 100px;"></div>
                                            <small class="text-muted d-block mt-2">Q1</small>
                                        </div>
                                        <div class="text-center w-100">
                                            <div class="bg-primary bg-opacity-50 rounded-top w-50 mx-auto"
                                                style="height: 150px;"></div>
                                            <small class="text-muted d-block mt-2">Q2</small>
                                        </div>
                                        <div class="text-center w-100">
                                            <div class="bg-primary bg-opacity-75 rounded-top w-50 mx-auto"
                                                style="height: 220px;"></div>
                                            <small class="text-muted d-block mt-2">Q3</small>
                                        </div>
                                        <div class="text-center w-100">
                                            <div class="bg-primary rounded-top w-50 mx-auto" style="height: 280px;">
                                            </div>
                                            <small class="text-muted d-block mt-2">Q4</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card shadow border-0 rounded-4 h-100">
                                <div class="card-header bg-white border-0 py-3">
                                    <h5 class="mb-0 fw-bold">Répartition par sexe</h5>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <!-- Donut Chart Placeholder Visual -->
                                    <div class="position-relative d-flex justify-content-center align-items-center rounded-circle"
                                        style="width: 200px; height: 200px; background: conic-gradient(#0d6efd 0% 60%, #dc3545 60% 100%);">
                                        <div class="bg-white rounded-circle position-absolute"
                                            style="width: 150px; height: 150px;"></div>
                                        <div class="position-absolute text-center">
                                            <h4 class="mb-0 fw-bold">1450</h4>
                                            <small class="text-muted">Total</small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center gap-4 mt-4 w-100">
                                        <div class="d-flex align-items-center">
                                            <span class="d-inline-block rounded-circle bg-primary me-2"
                                                style="width: 12px; height: 12px;"></span>
                                            <span class="text-muted">Hommes (60%)</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="d-inline-block rounded-circle bg-danger me-2"
                                                style="width: 12px; height: 12px;"></span>
                                            <span class="text-muted">Femmes (40%)</span>
                                        </div>
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