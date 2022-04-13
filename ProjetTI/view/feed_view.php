<body>
    <?php include('partials/_header.php'); ?>
    <br><br>

    <div class="container">
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

        <br>

        <!-- Mettre en ajax -->
        <?php
        while ($post = $getAllPosts->fetch()) {
        ?>
            <div class="card">
                <h5 class="card-header"><?= $post['title']; ?></h5>
                <div class="card-body">

                    <p class="card-text"><?= $post['content']; ?></p>
                </div>
                <div class="card-footer">
                    <p>Publié par <?= $post['idMem'] ?> le <?= $post['datePubli'] ?></p>
                    <p>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="bi bi-chat-square-heart text-primary"></i> Je kiff
                        </button>
                        Nombre de kiffs: <?= $post['compteur_like'] ?>
                    </p>
                </div>
            </div>
            <br>
        <?php
        }
        ?>

    </div>


</body>