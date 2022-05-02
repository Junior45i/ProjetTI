<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
include('partials/_header.php'); ?>


<body>
    <script>
        $(document).ready(function() {
            $(function() {
                $.ajax({
                    url: 'myPost.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.length);
                        for (var d of data) {
                            $("#mesPosts").append("<div class='card'> \
                                        <h5 class = 'card-header' > " + d.title + " </h5> \
                                            <div class = 'card-body' >\
                                            <p class = 'card-text' > " + d.content + " </p> \
                                            <a href = 'post_view.php?idPubli=" + d.idPubli + "'\
                                            class = 'btn btn-primary' > Accéder au post </a> \
                                            <boutton id = " + d.idPubli + "\
                                            class = 'btn btn-danger'> Supprimer </boutton> \
                                            </div></div></br>")
                        }
                    }
                });
            });
            $(document).on('click', 'boutton', function() {
                // console.log($(this).attr('id'))
                var idPublicationGlobal = $(this).attr('id');
                $.ajax({
                    url: 'delPost.php',
                    type: 'POST',
                    data: {
                        myFunction: 'delete',
                        myParams: {
                            idPublication: $(this).attr('id')
                        }
                    },
                    async: false,
                    dataType: 'text',
                    success: function(result) {
                        $("#result").html("<div class='alert alert-success alert-dismissible fade show' role='alert'>\
                                                <strong>Le post a bien été supprimé</strong>\
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>\
                                                </div>");
                        $('#' + idPublicationGlobal).parent().parent().remove();
                    },
                    error: function(result) {
                        console.log(result),
                            $("#result").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'> \
                                                                        <strong> Un problème est survenu </strong>\
                                                                        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
                    }
                });
            })
        })
    </script>
    <div class="container" id="result">
    </div>
    <div class="container" id="mesPosts">
        </br></br>
        <?php
        //Mettre en Ajax
        /* while ($question = $getAllMyQuestions->fetch()) {
        ?>
            <div class='card'>
                <h5 class='card-header'><?= $question['title']; ?></h5>
                <div class='card-body'>

                    <p class='card-text'><?= $question['content']; ?></p>
                    <a href='post.php?idPubli=<?= $question['idPubli']; ?>' class='btn btn-primary'>Accéder au post</a>
                    <a href='#' class="btn btn-warning">Modifier le post</a>
                    <a href='delPost.php?idPubli=<?= $question['idPubli']; ?>' class='btn btn-danger'>Supprimer</a>
                </div>
            </div>
            </br>
        <?php
        }*/
        ?>
    </div>
    <div class="container" id="error">
</body>

</html>