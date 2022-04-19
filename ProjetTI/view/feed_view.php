<body>
    <?php include('partials/_header.php'); ?>
    <!-- Barre de recherche -->
    <div class="container">
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="profile" class="img-lg rounded-circle mb-3">
                                    <div class="mb-3">
                                        <!-- Mettre nom -->
                                        <h3>David Grey. H</h3>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <!-- Mettre ville -->
                                            <h5 class="mb-0 mr-2 text-muted">Canada</h5>

                                        </div>
                                    </div>
                                    <!-- Mettre bio -->
                                    <p class="w-75 mx-auto mb-3">Bureau Oberhaeuser is a design bureau focused on Information- and Interface Design. </p>
                                    <div class="d-flex justify-content-center">
                                        <!-- <button class="btn btn-success mr-1">Hire Me</button> -->
                                        <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
                                    </div>
                                </div>
                                <div class="border-bottom py-4">
                                    <p>Posts</p>
                                    <!-- Mettre boule poste -->
                                </div>
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Sexe
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="#">@davidgrey</a>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Phone
                                        </span>
                                        <span class="float-right text-muted">
                                            <!-- Mettre téléphone -->
                                            006 3435 22
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Mail
                                        </span>
                                        <span class="float-right text-muted">
                                            <!-- Mettre mail -->
                                            Jacod@testmail.com
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            <!-- Mettre ville -->
                                            Ville
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="#">David Grey</a>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Rue
                                        </span>
                                        <span class="float-right text-muted">
                                            <!-- Mettre rue -->
                                            <a href="#">@davidgrey</a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="profile-feed">

                                    <form>
                                        <div class="form-group row">
                                            <div class="col-8">
                                                <input type="search" name="search" class="form-control">
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-success" type="submit">Rechercher</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <!-- Mettre en ajax -->
                                <?php
                                while ($post = $getAllPosts->fetch()) {
                                ?>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="profile" class="img-sm rounded-circle">
                                            <div class="ml-4">
                                                <div class="ml-4">
                                                    <h6>
                                                        <?= $post['idMem'] ?>
                                                        <small class="ml-4 text-muted"><i class="bi bi-clock"></i><?= $post['datePubli'] ?></small>
                                                    </h6>
                                                    <h5><?= $post['title']; ?></h5>
                                                    <p>
                                                        <?= $post['content']; ?>
                                                    <p class="small text-muted mt-2 mb-0">
                                                        <span>
                                                            <i class="bi bi-heart"></i><?= $post['compteur_like'] ?>
                                                        </span>
                                                        <span class="ml-2">
                                                            <!-- Rajouter compteur commentaire -->
                                                            <i class="bi bi-chat-square-dots"></i>11
                                                        </span>
                                                    </p>

                                                    <a href="post.php?idPubli=<?= $post['idPubli']; ?>" class="btn btn-primary">Accéder au post</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<style type="text/css">
    body {
        margin-top: 20px;
    }

    body {
        color: #6c7293;
    }

    .profile-navbar .nav-item .nav-link {
        color: #6c7293;
    }

    .profile-navbar .nav-item .nav-link.active {
        color: #464dee;
    }

    .profile-navbar .nav-item .nav-link i {
        font-size: 1.25rem;
    }

    .profile-feed-item {
        padding: 1.5rem 0;
        border-bottom: 1px solid #e9e9e9;
    }

    .img-sm {
        width: 43px;
        height: 43px;
    }