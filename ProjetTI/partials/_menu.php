    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">GossipHelha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <?php if (is_logged_in()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="feed_view.php">Fil d'actualité</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pubPost_view.php">Publier un post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="myPost_view.php">Mes posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php?id=<?= get_session('user_id') ?>">Mon Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Déconnexion</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Connection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Inscription</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>