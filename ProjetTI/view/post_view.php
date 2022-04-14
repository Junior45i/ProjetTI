<body>
<?php include('partials/_header.php'); ?>
    <br><br>

    <div class="container">
        <?php
            if(isset($question_date)){
                ?>
                <section class="show-content">
                    <h3><?= $question_title; ?></h3>
                    <hr>
                    <p><?= $question_content; ?></p>
                    <hr>
                    <small><?= $question_auteur  . ' ' . $question_date?></small>
                </section>
                <section class="show-comment">
                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Commentaire</label>
                            <textarea name="answer" id="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="comment" id="comment">commenter</button>
                        </div>
                    </form>
                    <?php
                        while($answer = $getComment->fetch()){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <?= $answer['id_auteur']?>
                                </div>
                                <div class="card-body">
                                    <?= $answer['contenu']?>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                    ?>

                </section>
                
                <?php
            }
        ?>
    </div>