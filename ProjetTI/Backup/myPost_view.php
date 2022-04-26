<body>
    <?php include('partials/_header.php'); ?>
    
    <div class="container">
        </br></br>
        <?php
        //Mettre en Ajax
        while ($question = $getAllMyQuestions->fetch()) {
        ?>
            <div class="card">
                <h5 class="card-header"><?= $question['title']; ?></h5>
                <div class="card-body">
                    
                    <p class="card-text"><?= $question['content']; ?></p>
                    <a href="post.php?idPubli=<?= $question['idPubli']; ?>" class="btn btn-primary">Accéder au post</a>
                    <a href="#" class="btn btn-warning">Modifier le post</a>
                    <a href="delPost.php?idPubli=<?=$question['idPubli'];?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </br>
        <?php
        }
        ?>
    </div>
</body>

</html>
