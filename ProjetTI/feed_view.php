<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
?>

<body>
    <?php include('partials/_header.php'); ?>
    <script>
        $(document).ready(function() {
            $(function() {
                    $.ajax({
                            url: 'feed.php',
                            type: 'POST',
                            data: {
                                myFunction: 'rechercheGlobale'
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data.length);
                                for (var d of data) {
                                    console.log(d);
                                    $("#feed").append("<div class = 'profile-feed' id='profile-feed'>\
                                                <div class = 'd-flex align-items-start profile-feed-item'>\
                                                <img src = 'https://bootdey.com/img/Content/avatar/avatar7.png' alt = 'profile' class = 'img-sm rounded-circle'>\
                                                <div class = 'ml-4' >\
                                                <div class = 'ml-4' >\
                                                <h6> <boutton id= " + d.idMem + ">" + d.preMem + " " + d.nomMem + "<boutton/><small class = 'ml-4 text-muted'> <i class = 'bi bi-clock'> </i>" + d.datePubli + "</small></h6>\
                                                <h5>" + d.title + "</h5> \
                                                <p>" + d.content + "</p><p class = 'small text-muted mt-2 mb-0'>\
                                                <span class = 'ml-2'>\
                                                <a href = 'post_view.php?idPubli=" + d.idPubli + "'class = 'bi bi-chat-square-dots'>" + "  " + d.nbCom + "</a>\
                                                </span > \
                                                </p> \
                                                </div> \
                                                </div> \
                                                <br></div></div>")
                                }
                                $("#search").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();
                                    $("#feed div").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            }
                        }),
                        $.ajax({
                            url: 'feed.php',
                            type: 'POST',
                            data: {
                                myFunction: 'afficherProfil',
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data.length);
                                for (var d of data) {
                                    console.log(d);
                                    $("#membre").append("<div class='border-bottom text-center pb-4 '>\
                                                <img src = 'https://bootdey.com/img/Content/avatar/avatar7.png'\
                                                alt = 'profile'\
                                                class = 'mx-auto d-block img-lg rounded-circle mb-3' >\
                                                <div class = ' mb-3 text-center'>\
                                                <h3>" + d.nomMem + " " + d.preMem + " </h3>\
                                                <div class = 'd-flex align-items-center justify-content-center' >\
                                                <h5 class = 'mb-0 mr-2 text-muted' >" + d.ville + "</h5>\
                                                </div>\
                                                </div>\
                                                <p class = 'w-75 mx-auto mb-3 text-center' >" + d.bio + "</p>\
                                                </div>\
                                                <div class = 'border-bottom py-4'>\
                                                </div>\
                                                <div class = 'py-4'>\
                                                <p class = 'clearfix'>\
                                                <span class = 'float-left'>\
                                                Sexe\
                                                </span>\
                                                <span class = 'float-right text-muted'>\
                                                <a>" + d.sexe + "</a> \
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Phone\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + d.telephone + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Mail\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + d.mail + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Ville\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + d.ville + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Rue\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                <a>" + d.rue + "</a>\
                                                </span>\
                                                </p>\
                                                </div>")
                                }
                                $("#search").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();
                                    $("#feed div").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            }
                        })
                }),
                $(document).on('click', 'boutton', function() {
                    $.ajax({
                        url: 'feed.php',
                        type: 'POST',
                        data: {
                            myFunction: 'rechercheUtilisateur',
                            myParams: {
                                idMem: $(this).attr('id')
                            }
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            for (var d of data) {
                                $("#membre").html("<div class='border-bottom text-center pb-4 '>\
                                                <img src = 'https://bootdey.com/img/Content/avatar/avatar7.png'\
                                                alt = 'profile'\
                                                class = 'mx-auto d-block img-lg rounded-circle mb-3' >\
                                                <div class = ' mb-3 text-center'>\
                                                <h3>" + d.nomMem + " " + d.preMem + " </h3>\
                                                <div class = 'd-flex align-items-center justify-content-center' >\
                                                <h5 class = 'mb-0 mr-2 text-muted' >" + d.ville + "</h5>\
                                                </div>\
                                                </div>\
                                                <p class = 'w-75 mx-auto mb-3 text-center' >" + d.bio + "</p>\
                                                </div>\
                                                <div class = 'border-bottom py-4'>\
                                                </div>\
                                                <div class = 'py-4'>\
                                                <p class = 'clearfix'>\
                                                <span class = 'float-left'>\
                                                Sexe\
                                                </span>\
                                                <span class = 'float-right text-muted'>\
                                                <a>" + d.sexe + "</a> \
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Phone\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + d.telephone + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Mail\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + d.mail + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Ville\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + d.ville + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Rue\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                <a>" + d.rue + "</a>\
                                                </span>\
                                                </p>\
                                                </div>")
                            }
                        },
                        error: function(data) {
                            console.log(data),
                                $("#membre").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'> \
                                                                    <strong>" + data + "</strong>\
                                                                    <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
                        }
                    });
                })
        })
    </script>
    <!-- Barre de recherche -->
    <div class="container">
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4" id="membre">
                            </div>
                            <div class="col-lg-6">
                                <div class="profile-feed">

                                    <form>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <input type="search" name="search" id="search" class="form-control">
                                            </div>
                                            <!-- <div class="col-4">
                                                <button class="btn btn-success" id="search" type="submit">Rechercher</button>
                                            </div> -->
                                        </div>
                                    </form>

                                </div>
                                <div class="feed" id="feed">
                                </div>
                                <!-- Mettre en ajax -->

                                <?php
                                /*while ($post = $getAllPosts->fetch()) {
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
                                                    </p>
                                                    <p class="small text-muted mt-2 mb-0">
                                                        <span>
                                                            <i class="bi bi-heart"></i><?= $post['compteur_like'] ?>
                                                        </span>
                                                        <span class="ml-2">
                                                            <!-- Rajouter compteur commentaire -->
                                                            <a href="post.php?idPubli=<?= $post['idPubli']; ?>" class="bi bi-chat-square-dots"></a><?= $post['datePubli'] ?>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                <?php
                                }*/
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
        margin: 0;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
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