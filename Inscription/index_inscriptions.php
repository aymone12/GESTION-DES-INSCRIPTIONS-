<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions - Centre de Formation</title>
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
            <?php $active = 'inscriptions'; include_once("../includes/_menu.php"); ?>

            <!-- Content -->
            <div class="col py-3 h-100 d-flex flex-column">
                <!-- Header -->
                <!-- Header -->
                <?php include_once("../includes/_navbar.php"); ?>

                <!-- Inscriptions Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0 text-dark">Gestion des Inscriptions</h3>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary rounded-pill shadow-sm py-2 px-3"><i
                                    class="bi bi-plus-lg me-2"></i>Nouvelle Inscription</button>
                            <button
                                class="btn btn-white bg-white border rounded-pill shadow-sm py-2 px-3 text-secondary"><i
                                    class="bi bi-filter me-2"></i>Filtrer</button>
                        </div>
                    </div>

                    <!-- Filter Tabs -->
                    <ul class="nav nav-pills mb-4 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active rounded-pill shadow-sm" aria-current="page" href="#">Tous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white text-secondary border rounded-pill shadow-sm" href="#">En
                                attente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white text-secondary border rounded-pill shadow-sm"
                                href="#">Confirmés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-white text-secondary border rounded-pill shadow-sm"
                                href="#">Annulés</a>
                        </li>
                    </ul>

                    <!-- Inscriptions Table -->
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="ps-4 text-muted small text-uppercase">ID</th>
                                            <th scope="col" class="text-muted small text-uppercase">Étudiant</th>
                                            <th scope="col" class="text-muted small text-uppercase">Cours</th>
                                            <th scope="col" class="text-muted small text-uppercase">Date</th>
                                            <th scope="col" class="text-muted small text-uppercase">Montant</th>
                                            <th scope="col" class="text-muted small text-uppercase">Statut</th>
                                            <th scope="col" class="text-end pe-4 text-muted small text-uppercase">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        <!-- Row 1 -->
                                        <tr>
                                            <td class="ps-4 fw-bold text-secondary">#10234</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=random"
                                                        class="rounded-circle" width="32" height="32" alt="">
                                                    <span class="ms-3 fw-medium">Jean Dupont</span>
                                                </div>
                                            </td>
                                            <td>Fullstack JS</td>
                                            <td class="text-muted">12 Jan 2026</td>
                                            <td class="fw-bold">299 €</td>
                                            <td><span
                                                    class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Payé</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle me-1"><i
                                                        class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light rounded-circle"><i
                                                        class="bi bi-three-dots-vertical"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Row 2 -->
                                        <tr>
                                            <td class="ps-4 fw-bold text-secondary">#10235</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Alice+Martin&background=random"
                                                        class="rounded-circle" width="32" height="32" alt="">
                                                    <span class="ms-3 fw-medium">Alice Martin</span>
                                                </div>
                                            </td>
                                            <td>UI/UX Design</td>
                                            <td class="text-muted">14 Jan 2026</td>
                                            <td class="fw-bold">199 €</td>
                                            <td><span
                                                    class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">En
                                                    attente</span></td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle me-1"><i
                                                        class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light rounded-circle"><i
                                                        class="bi bi-three-dots-vertical"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Row 3 -->
                                        <tr>
                                            <td class="ps-4 fw-bold text-secondary">#10236</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Pierre+Lefevre&background=random"
                                                        class="rounded-circle" width="32" height="32" alt="">
                                                    <span class="ms-3 fw-medium">Pierre Lefevre</span>
                                                </div>
                                            </td>
                                            <td>DevOps</td>
                                            <td class="text-muted">15 Jan 2026</td>
                                            <td class="fw-bold">349 €</td>
                                            <td><span
                                                    class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Annulé</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <button class="btn btn-sm btn-light rounded-circle me-1"><i
                                                        class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light rounded-circle"><i
                                                        class="bi bi-three-dots-vertical"></i></button>
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