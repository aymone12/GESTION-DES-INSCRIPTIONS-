<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiants - Centre de Formation</title>
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
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Students Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Gestion des Étudiants</h3>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary rounded-pill shadow-sm py-2 px-3"><i
                                    class="bi bi-plus-lg me-2"></i>Ajouter</button>
                            <button
                                class="btn btn-white bg-white border rounded-pill shadow-sm py-2 px-3 text-secondary"><i
                                    class="bi bi-filter me-2"></i>Filtrer</button>
                            <button
                                class="btn btn-white bg-white border rounded-pill shadow-sm py-2 px-3 text-secondary"><i
                                    class="bi bi-download me-2"></i>Exporter</button>
                        </div>
                    </div>

                    <!-- Students Table -->
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="ps-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="selectAll">
                                                </div>
                                            </th>
                                            <th scope="col" class="text-uppercase text-muted small">Étudiant</th>
                                            <th scope="col" class="text-uppercase text-muted small">Email</th>
                                            <th scope="col" class="text-uppercase text-muted small">Téléphone</th>
                                            <th scope="col" class="text-uppercase text-muted small">Cours</th>
                                            <th scope="col" class="text-uppercase text-muted small">Date</th>
                                            <th scope="col" class="text-uppercase text-muted small">Statut</th>
                                            <th scope="col" class="text-end pe-4 text-uppercase text-muted small">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <!-- Row 1 -->
                                        <tr>
                                            <td class="ps-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=0D6EFD&color=fff"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <span class="ms-3 fw-bold text-dark">Jean Dupont</span>
                                                </div>
                                            </td>
                                            <td class="text-muted">jean.dupont@email.com</td>
                                            <td class="text-muted">+33 6 12 34 56 78</td>
                                            <td class="text-muted">3</td>
                                            <td class="text-muted">15 Jan 2025</td>
                                            <td><span
                                                    class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Actif</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle me-1"><i
                                                        class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-light rounded-circle text-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Row 2 -->
                                        <tr>
                                            <td class="ps-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Alice+Martin&background=ffc107&color=000"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <span class="ms-3 fw-bold text-dark">Alice Martin</span>
                                                </div>
                                            </td>
                                            <td class="text-muted">alice.m@email.com</td>
                                            <td class="text-muted">+33 6 98 76 54 32</td>
                                            <td class="text-muted">1</td>
                                            <td class="text-muted">20 Feb 2025</td>
                                            <td><span
                                                    class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">En
                                                    pause</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle me-1"><i
                                                        class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-light rounded-circle text-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Row 3 -->
                                        <tr>
                                            <td class="ps-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Pierre+Lefevre&background=0dcaf0&color=000"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <span class="ms-3 fw-bold text-dark">Pierre Lefevre</span>
                                                </div>
                                            </td>
                                            <td class="text-muted">pierre.l@email.com</td>
                                            <td class="text-muted">+33 6 11 22 33 44</td>
                                            <td class="text-muted">5</td>
                                            <td class="text-muted">10 Dec 2024</td>
                                            <td><span
                                                    class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Actif</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle me-1"><i
                                                        class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-light rounded-circle text-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Row 4 -->
                                        <tr>
                                            <td class="ps-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Sophie+Bernard&background=dc3545&color=fff"
                                                        class="rounded-circle" width="36" height="36" alt="">
                                                    <span class="ms-3 fw-bold text-dark">Sophie Bernard</span>
                                                </div>
                                            </td>
                                            <td class="text-muted">sophie.b@email.com</td>
                                            <td class="text-muted">+33 6 55 44 33 22</td>
                                            <td class="text-muted">0</td>
                                            <td class="text-muted">01 Mar 2025</td>
                                            <td><span
                                                    class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Inactif</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle me-1"><i
                                                        class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-light rounded-circle text-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end p-3 border-top">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                                    </ul>
                                </nav>
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