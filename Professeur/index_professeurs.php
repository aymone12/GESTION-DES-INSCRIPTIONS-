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
                            <button class="btn btn-primary rounded-pill shadow-sm py-2 px-3"><i
                                    class="bi bi-plus-lg me-2"></i>Ajouter</button>
                        </div>
                    </div>

                    <!-- Professors Grid -->
                    <div class="row g-4">
                        <!-- Prof Card 1 -->
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card shadow border-0 rounded-4 h-100 text-center p-3 transition-hover">
                                <div class="card-body">
                                    <div class="position-relative d-inline-block mb-3">
                                        <img src="https://ui-avatars.com/api/?name=Marc+Dubois&background=0D6EFD&color=fff&size=128"
                                            class="rounded-circle shadow-sm" width="96" height="96" alt="Avatar">
                                        <span
                                            class="position-absolute bottom-0 end-0 p-2 bg-success border border-white rounded-circle"></span>
                                    </div>
                                    <h5 class="fw-bold mb-1">Marc Dubois</h5>
                                    <p class="text-muted small mb-3">Expert Java & Spring</p>
                                    <div class="d-flex justify-content-center gap-2 mb-4">
                                        <span class="badge bg-light text-secondary border rounded-pill">Java</span>
                                        <span class="badge bg-light text-secondary border rounded-pill">Spring
                                            Boot</span>
                                    </div>
                                    <div class="row g-0 border-top pt-3">
                                        <div class="col-6 border-end">
                                            <h6 class="fw-bold mb-0 text-dark">12</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Cours</small>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="fw-bold mb-0 text-dark">450+</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Étudiants</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-0 pt-0 pb-3">
                                    <button class="btn btn-outline-primary btn-sm rounded-pill w-100">Voir le
                                        profil</button>
                                </div>
                            </div>
                        </div>

                        <!-- Prof Card 2 -->
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card shadow border-0 rounded-4 h-100 text-center p-3 transition-hover">
                                <div class="card-body">
                                    <div class="position-relative d-inline-block mb-3">
                                        <img src="https://ui-avatars.com/api/?name=Sophie+Morel&background=ffc107&color=000&size=128"
                                            class="rounded-circle shadow-sm" width="96" height="96" alt="Avatar">
                                        <span
                                            class="position-absolute bottom-0 end-0 p-2 bg-warning border border-white rounded-circle"></span>
                                    </div>
                                    <h5 class="fw-bold mb-1">Sophie Morel</h5>
                                    <p class="text-muted small mb-3">UX/UI Designer</p>
                                    <div class="d-flex justify-content-center gap-2 mb-4">
                                        <span class="badge bg-light text-secondary border rounded-pill">Figma</span>
                                        <span class="badge bg-light text-secondary border rounded-pill">Adobe XD</span>
                                    </div>
                                    <div class="row g-0 border-top pt-3">
                                        <div class="col-6 border-end">
                                            <h6 class="fw-bold mb-0 text-dark">8</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Cours</small>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="fw-bold mb-0 text-dark">320+</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Étudiants</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-0 pt-0 pb-3">
                                    <button class="btn btn-outline-primary btn-sm rounded-pill w-100">Voir le
                                        profil</button>
                                </div>
                            </div>
                        </div>

                        <!-- Prof Card 3 -->
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card shadow border-0 rounded-4 h-100 text-center p-3 transition-hover">
                                <div class="card-body">
                                    <div class="position-relative d-inline-block mb-3">
                                        <img src="https://ui-avatars.com/api/?name=Lucas+Petit&background=6f42c1&color=fff&size=128"
                                            class="rounded-circle shadow-sm" width="96" height="96" alt="Avatar">
                                        <span
                                            class="position-absolute bottom-0 end-0 p-2 bg-secondary border border-white rounded-circle"></span>
                                    </div>
                                    <h5 class="fw-bold mb-1">Lucas Petit</h5>
                                    <p class="text-muted small mb-3">DevOps Engineer</p>
                                    <div class="d-flex justify-content-center gap-2 mb-4">
                                        <span class="badge bg-light text-secondary border rounded-pill">Docker</span>
                                        <span class="badge bg-light text-secondary border rounded-pill">K8s</span>
                                    </div>
                                    <div class="row g-0 border-top pt-3">
                                        <div class="col-6 border-end">
                                            <h6 class="fw-bold mb-0 text-dark">5</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Cours</small>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="fw-bold mb-0 text-dark">150+</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Étudiants</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-0 pt-0 pb-3">
                                    <button class="btn btn-outline-primary btn-sm rounded-pill w-100">Voir le
                                        profil</button>
                                </div>
                            </div>
                        </div>

                        <!-- Prof Card 4 -->
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card shadow border-0 rounded-4 h-100 text-center p-3 transition-hover">
                                <div class="card-body">
                                    <div class="position-relative d-inline-block mb-3">
                                        <img src="https://ui-avatars.com/api/?name=Emma+Roux&background=dc3545&color=fff&size=128"
                                            class="rounded-circle shadow-sm" width="96" height="96" alt="Avatar">
                                        <span
                                            class="position-absolute bottom-0 end-0 p-2 bg-success border border-white rounded-circle"></span>
                                    </div>
                                    <h5 class="fw-bold mb-1">Emma Roux</h5>
                                    <p class="text-muted small mb-3">Marketing Digital</p>
                                    <div class="d-flex justify-content-center gap-2 mb-4">
                                        <span class="badge bg-light text-secondary border rounded-pill">SEO</span>
                                        <span class="badge bg-light text-secondary border rounded-pill">Ads</span>
                                    </div>
                                    <div class="row g-0 border-top pt-3">
                                        <div class="col-6 border-end">
                                            <h6 class="fw-bold mb-0 text-dark">9</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Cours</small>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="fw-bold mb-0 text-dark">600+</h6>
                                            <small class="text-muted" style="font-size: 0.75rem;">Étudiants</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-0 pt-0 pb-3">
                                    <button class="btn btn-outline-primary btn-sm rounded-pill w-100">Voir le
                                        profil</button>
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