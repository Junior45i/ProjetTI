    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">gossipHelha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (is_logged_in()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="feed">Fil d'actualité</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="publierUnPost">Publier un post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mesPosts">Mes posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil">Mon Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Déconnexion</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="connection">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription">Inscription</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>