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
            <div
                class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark text-white sticky-top vh-100 overflow-y-auto sidebar-scroll">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-100">
                    <a href="dashboard.html"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <i class="fs-4 bi-grid-1x2-fill me-2"></i>
                        <span class="fs-5 d-none d-sm-inline fw-bold font-monospace">LMS Admin</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100 gap-2"
                        id="menu">
                        <li class="nav-item w-100">
                            <a href="dashboard.html"
                                class="nav-link d-flex align-items-center px-2 text-white-50 hover-text-white">
                                <i class="fs-5 bi-speedometer2"></i> <span class="ms-2 d-none d-sm-inline">Tableau de
                                    bord</span>
                            </a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="etudiants.html"
                                class="nav-link d-flex align-items-center px-2 text-white-50 hover-text-white">
                                <i class="fs-5 bi-people"></i> <span class="ms-2 d-none d-sm-inline">Étudiants</span>
                            </a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="professeurs.html"
                                class="nav-link active d-flex align-items-center px-2 text-white bg-primary bg-gradient shadow-sm">
                                <i class="fs-5 bi-person-video3"></i> <span
                                    class="ms-2 d-none d-sm-inline">Professeurs</span>
                            </a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="cours.html"
                                class="nav-link d-flex align-items-center px-2 text-white-50 hover-text-white">
                                <i class="fs-5 bi-book"></i> <span class="ms-2 d-none d-sm-inline">Cours</span>
                            </a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="inscriptions.html"
                                class="nav-link d-flex align-items-center px-2 text-white-50 hover-text-white">
                                <i class="fs-5 bi-pencil-square"></i> <span
                                    class="ms-2 d-none d-sm-inline">Inscriptions</span>
                            </a>
                        </li>
                        <li class="nav-item w-100">
                            <a href="statistiques.html"
                                class="nav-link d-flex align-items-center px-2 text-white-50 hover-text-white">
                                <i class="fs-5 bi-graph-up"></i> <span
                                    class="ms-2 d-none d-sm-inline">Statistiques</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="w-100 border-white-50 mt-auto">
                    <div class="dropdown pb-4 w-100 text-center text-sm-start">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle justify-content-center justify-content-sm-start"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="hugenerd"
                                width="32" height="32" class="rounded-circle shadow-sm">
                            <span class="d-none d-sm-inline mx-2 small">Administrateur</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Paramètres</a></li>
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded-4 mb-4 px-3 py-2">
                    <div class="container-fluid">
                        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <form class="d-flex ms-auto flex-grow-1 flex-lg-grow-0" style="min-width: 300px;">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0 rounded-start-pill ps-3"><i
                                            class="bi bi-search text-muted"></i></span>
                                    <input class="form-control bg-light border-0 rounded-end-pill me-2" type="search"
                                        placeholder="Rechercher..." aria-label="Search">
                                </div>
                            </form>
                            <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                                <a href="#" class="text-secondary position-relative">
                                    <i class="bi bi-bell fs-5"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </a>
                                <div class="vr mx-2"></div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-end d-none d-lg-block line-height-sm">
                                        <span class="d-block fw-bold small">Admin User</span>
                                        <span class="d-block text-muted" style="font-size: 0.75rem;">Super Admin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

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