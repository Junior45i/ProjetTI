<?php
//Page d'affichage de nos posts'
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
include('partials/_header.php'); ?>

<body>
    <script>
        // Affichege de base
        $(document).ready(function() {
            $(function() {
                $.ajax({
                    url: 'myPost.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data == '') {
                            $("#result").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'>\
                                                <strong>Aucun post disponible</strong>\
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>\
                                                </div>");
                        }
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
                    },
                    error: function(data) {
                        $("#mesPosts").html("<div class='alert alert-success alert-dismissible fade show' role='alert'>\
                                                <strong>Aucun post disponible</strong>\
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>\
                                                </div>");
                    }
                });
            });
            // Click pour suppression d'un post
            $(document).on('click', 'boutton', function() {
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
                        //Suppression en visuel par suppression des parents
                        $('#' + idPublicationGlobal).parent().parent().remove();
                    },
                    error: function(result) {
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
    </div>
    <div class="container" id="error">
</body>

</html>