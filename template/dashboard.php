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
    </style>
</head>

<body class="bg-body-tertiary">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php $active = 'dashboard'; include_once("../includes/_menu.php"); ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Dashboard Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Tableau de Bord</h3>
                        <button class="btn btn-primary btn-sm rounded-pill shadow-sm"><i
                                class="bi bi-download me-2"></i>Rapport</button>
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
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success rounded-pill">+2.5%</span>
                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Étudiants</h6>
                                    <h2 class="fw-bold mb-0 text-dark">1,254</h2>
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
                                        <span
                                            class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill">0%</span>
                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Professeurs</h6>
                                    <h2 class="fw-bold mb-0 text-dark">42</h2>
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
                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill">+5</span>
                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Cours</h6>
                                    <h2 class="fw-bold mb-0 text-dark">36</h2>
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
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success rounded-pill">+12%</span>
                                    </div>
                                    <h6 class="text-muted text-uppercase small fw-bold mb-1">Revenus</h6>
                                    <h2 class="fw-bold mb-0 text-dark">12k €</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-lg-8">
                            <div class="card shadow border-0 rounded-4 h-100">
                                <div
                                    class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 fw-bold">Inscriptions Mensuelles</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm rounded-circle" type="button"
                                            data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Cette année</a></li>
                                            <li><a class="dropdown-item" href="#">Ce mois</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <!-- CSS Chart -->
                                    <div class="d-flex align-items-end justify-content-between px-2"
                                        style="height: 250px;">
                                        <div class="d-flex flex-column align-items-center w-100">
                                            <div class="w-50 bg-primary bg-gradient rounded-top shadow-sm"
                                                style="height: 45%"></div>
                                            <small class="text-muted mt-2" style="font-size: 0.7rem;">Jan</small>
                                        </div>
                                        <div class="d-flex flex-column align-items-center w-100">
                                            <div class="w-50 bg-primary bg-gradient rounded-top shadow-sm opacity-50"
                                                style="height: 60%"></div>
                                            <small class="text-muted mt-2" style="font-size: 0.7rem;">Fév</small>
                                        </div>
                                        <div class="d-flex flex-column align-items-center w-100">
                                            <div class="w-50 bg-primary bg-gradient rounded-top shadow-sm"
                                                style="height: 75%"></div>
                                            <small class="text-muted mt-2" style="font-size: 0.7rem;">Mar</small>
                                        </div>
                                        <div class="d-flex flex-column align-items-center w-100">
                                            <div class="w-50 bg-primary bg-gradient rounded-top shadow-sm opacity-75"
                                                style="height: 50%"></div>
                                            <small class="text-muted mt-2" style="font-size: 0.7rem;">Avr</small>
                                        </div>
                                        <div class="d-flex flex-column align-items-center w-100">
                                            <div class="w-50 bg-primary bg-gradient rounded-top shadow-sm"
                                                style="height: 80%"></div>
                                            <small class="text-muted mt-2" style="font-size: 0.7rem;">Mai</small>
                                        </div>
                                        <div class="d-flex flex-column align-items-center w-100">
                                            <div class="w-50 bg-primary bg-gradient rounded-top shadow-sm"
                                                style="height: 65%"></div>
                                            <small class="text-muted mt-2" style="font-size: 0.7rem;">Juin</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card shadow border-0 rounded-4 h-100">
                                <div class="card-header bg-white border-0 py-3">
                                    <h5 class="mb-0 fw-bold">Top Catégories</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span class="fw-medium">Développement Web</span>
                                            <span class="text-muted small">85%</span>
                                        </div>
                                        <div class="progress rounded-pill bg-light" style="height: 8px;">
                                            <div class="progress-bar bg-primary bg-gradient rounded-pill"
                                                role="progressbar" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span class="fw-medium">Data Science</span>
                                            <span class="text-muted small">60%</span>
                                        </div>
                                        <div class="progress rounded-pill bg-light" style="height: 8px;">
                                            <div class="progress-bar bg-info bg-gradient rounded-pill"
                                                role="progressbar" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span class="fw-medium">Marketing</span>
                                            <span class="text-muted small">45%</span>
                                        </div>
                                        <div class="progress rounded-pill bg-light" style="height: 8px;">
                                            <div class="progress-bar bg-warning bg-gradient rounded-pill"
                                                role="progressbar" style="width: 45%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span class="fw-medium">Design</span>
                                            <span class="text-muted small">30%</span>
                                        </div>
                                        <div class="progress rounded-pill bg-light" style="height: 8px;">
                                            <div class="progress-bar bg-danger bg-gradient rounded-pill"
                                                role="progressbar" style="width: 30%"></div>
                                        </div>
                                    </div>
                                </div>
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
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=random"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-0 text-dark">Jean Dupont</p>
                                                        <p class="text-muted small mb-0">jean@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="fw-medium">Dev Fullstack</span></td>
                                            <td class="text-muted">05 Jan 2026</td>
                                            <td><span
                                                    class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Confirmé</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle"><i
                                                        class="bi bi-three-dots-vertical"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Alice+Martin&background=random"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-0 text-dark">Alice Martin</p>
                                                        <p class="text-muted small mb-0">alice@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="fw-medium">UX/UI Design</span></td>
                                            <td class="text-muted">04 Jan 2026</td>
                                            <td><span
                                                    class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">En
                                                    attente</span></td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle"><i
                                                        class="bi bi-three-dots-vertical"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Pierre+Lefevre&background=random"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-0 text-dark">Pierre Lefevre</p>
                                                        <p class="text-muted small mb-0">pierre@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="fw-medium">Data Science</span></td>
                                            <td class="text-muted">03 Jan 2026</td>
                                            <td><span
                                                    class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Refusé</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle"><i
                                                        class="bi bi-three-dots-vertical"></i></button>
                                            </td>
                                        </tr>
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
</body>

</html>