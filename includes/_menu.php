<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark text-white sticky-top vh-100 overflow-y-auto sidebar-scroll">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-100">
        <a href="../template/dashboard.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <i class="fs-4 bi-grid-1x2-fill me-2"></i>
            <span class="fs-5 d-none d-sm-inline fw-bold font-monospace">OSbt Admin</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100 gap-2" id="menu">
            <li class="nav-item w-100">
                <a href="../template/dashboard.php" class="nav-link d-flex align-items-center px-2 <?php echo (isset($active) && $active == 'dashboard') ? 'active text-white bg-primary bg-gradient shadow-sm' : 'text-white-50 hover-text-white'; ?>">
                    <i class="fs-5 bi-speedometer2"></i> <span class="ms-2 d-none d-sm-inline">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="../Etudiant/index_etudiants.php" class="nav-link d-flex align-items-center px-2 <?php echo (isset($active) && $active == 'etudiants') ? 'active text-white bg-primary bg-gradient shadow-sm' : 'text-white-50 hover-text-white'; ?>">
                    <i class="fs-5 bi-people"></i> <span class="ms-2 d-none d-sm-inline">Étudiants</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="../Professeur/index_professeurs.php" class="nav-link d-flex align-items-center px-2 <?php echo (isset($active) && $active == 'professeurs') ? 'active text-white bg-primary bg-gradient shadow-sm' : 'text-white-50 hover-text-white'; ?>">
                    <i class="fs-5 bi-person-video3"></i> <span class="ms-2 d-none d-sm-inline">Professeurs</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="../Cours/index_cours.php" class="nav-link d-flex align-items-center px-2 <?php echo (isset($active) && $active == 'cours') ? 'active text-white bg-primary bg-gradient shadow-sm' : 'text-white-50 hover-text-white'; ?>">
                    <i class="fs-5 bi-book"></i> <span class="ms-2 d-none d-sm-inline">Cours</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="../Inscription/index_inscriptions.php" class="nav-link d-flex align-items-center px-2 <?php echo (isset($active) && $active == 'inscriptions') ? 'active text-white bg-primary bg-gradient shadow-sm' : 'text-white-50 hover-text-white'; ?>">
                    <i class="fs-5 bi-pencil-square"></i> <span class="ms-2 d-none d-sm-inline">Inscriptions</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="../template/download_report.php" class="nav-link d-flex align-items-center px-2 <?php echo (isset($active) && $active == 'download_report') ? 'active text-white bg-primary bg-gradient shadow-sm' : 'text-white-50 hover-text-white'; ?>">
                    <i class="fs-5 bi-download"></i> <span class="ms-2 d-none d-sm-inline">Télécharger Rapport</span>
                </a>
            </li>
        </ul>
        <hr class="w-100 border-white-50 mt-auto">
        <div class="dropdown pb-4 w-100 text-center text-sm-start">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle justify-content-center justify-content-sm-start" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://ui-avatars.com/api/?name=o+osbt&background=random" alt="hugenerd" width="32" height="32" class="rounded-circle shadow-sm">
                <span class="d-none d-sm-inline mx-2 small">o osbt</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow-sm">
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
