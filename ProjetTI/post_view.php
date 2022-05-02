<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
?>

<body>
    <?php include('partials/_header.php'); ?>
    <script>
        var idPublication = <?php echo $_GET['idPubli'] . ";" ?>
        $(document).ready(function() {
            $.ajax({
                url: 'post.php',
                type: 'GET',
                data: {
                    myFunction: 'affichagePost',
                    myParams: {
                        idPubli: idPublication
                    }
                },
                dataType: 'json',
                success: function(data) {
                    // for (var d of data) {
                        console.log(data);
                        $("#containerPost").append("<section class='show-content'>\
                            <h3>"+data[0].title+"</h3>\
                            <hr>\
                            <p>"+data[0].content+"</p>\
                            <hr>\
                            <small>"+data[0].datePubli+"</small>\
                            </section>\
                            <section class='show-comment'>\
                            <div class='mb-3'>\
                            <label for='exampleInputEmail' class='form-label'>Commentaire</label>\
                            <textarea name='answer' id='answer' class='form-control'></textarea>\
                            <br>\
                            <button class='btn btn-primary' type='submit' name='comment' id='comment'>commenter</button>\
                            </div>")
                    //}
                    // Rajouter  
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
    </script>
    <br><br>

    <div class="container" id="containerPost">
        <!-- Mettre en ajax -->
        <?php
        if (isset($question_date)) {
        ?>
            <section class="show-comment">
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Commentaire</label>
                        <textarea name="answer" id="answer" class="form-control"></textarea>
                        <br>
                        <button class="btn btn-primary" type="submit" name="comment" id="comment">commenter</button>
                    </div>
                <?php
                while ($answer = $getComment->fetch()) {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $answer['id_auteur'] ?>
                        </div>
                        <div class="card-body">
                            <?= $answer['contenu'] ?>
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
</body>

</html>