<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
?>
<!-- Affichage du feed -->

<head>
    <link rel="icon" type="image/png" sizes="16x16" href="image/logoDetour.png">
</head>

<body>
    <?php include('partials/_header.php'); ?>
    <script>
        var admin = <?php echo $_SESSION['administrateur']; ?>;
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
                                for (var d of data) {
                                    $("#feed").append("<div class = 'profile-feed' id='profile-feed'>\
                                                <div class = 'd-flex align-items-start profile-feed-item' id='test'>\
                                                <img src = 'https://bootdey.com/img/Content/avatar/avatar7.png' alt = 'profile' class = 'img-sm rounded-circle'>\
                                                <div class = 'ml-4' >\
                                                <div class = 'ml-4' >\
                                                <h6> <boutton id= " + d.idMem + ">" + d.preMem + " " + d.nomMem + "<boutton/><small class = 'ml-4 text-muted'> <i class = 'bi bi-clock'> </i>" + d.datePubli + "</small></h6>\
                                                <h5>" + d.title + "</h5> \
                                                <p>" + d.content + "</p><p class = 'small text-muted mt-2 mb-0'>\
                                                <span class = 'ml-2'>\
                                                <a href = 'post_view.php?idPubli=" + d.idPubli + "'class = 'bi bi-chat-square-dots'>" + "  " + d.nbCom + "</a>\
                                                </span><br></div></div>");
                                    if (admin == 1) {
                                        $("#test").append("<test type='button' class='btn btn-danger' id=" + d.idPubli + ">Supprimer</test>")
                                    }

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
                                for (var d of data) {
                                    var ville = d.ville == null ? '' : d.ville;
                                    var rue = d.rue == null ? '' : d.rue;
                                    var bio = d.bio == null ? '' : d.bio;
                                    var sexe = d.sexe == null ? '' : d.sexe;
                                    var telephone = d.telephone == null ? '' : d.telephone;
                                    $("#membre").append("<div class='border-bottom text-center pb-4 '>\
                                                <img src = 'https://bootdey.com/img/Content/avatar/avatar7.png'\
                                                alt = 'profile'\
                                                class = 'mx-auto d-block img-lg rounded-circle mb-3' >\
                                                <div class = ' mb-3 text-center'>\
                                                <h3>" + d.nomMem + " " + d.preMem + " </h3>\
                                                <div class = 'd-flex align-items-center justify-content-center' >\
                                                <h5 class = 'mb-0 mr-2 text-muted' >" + ville + "</h5>\
                                                </div>\
                                                </div>\
                                                <p class = 'w-75 mx-auto mb-3 text-center' >" + bio + "</p>\
                                                </div>\
                                                <div class = 'border-bottom py-4'>\
                                                </div>\
                                                <div class = 'py-4'>\
                                                <p class = 'clearfix'>\
                                                <span class = 'float-left'>\
                                                Sexe\
                                                </span>\
                                                <span class = 'float-right text-muted'>\
                                                <a>" + sexe + "</a> \
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                GSM\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + telephone + "\
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
                                                " + ville + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Rue\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                <a>" + rue + "</a>\
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
                // Suppression en tant que admin
                $(document).on('click', 'test', function() {
                    var idPublication = $(this).attr('id');
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
                        },
                        error: function(result) {
                            $("#result").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'> \
                                                                        <strong> Un problème est survenu </strong>\
                                                                        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
                        }
                    });
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
                                var ville = d.ville == null ? '' : d.ville;
                                var rue = d.rue == null ? '' : d.rue;
                                var bio = d.bio == null ? '' : d.bio;
                                var sexe = d.sexe == null ? '' : d.sexe;
                                var telephone = d.telephone == null ? '' : d.telephone;
                                $("#membre").html("<div class='border-bottom text-center pb-4 '>\
                                                <img src = 'https://bootdey.com/img/Content/avatar/avatar7.png'\
                                                alt = 'profile'\
                                                class = 'mx-auto d-block img-lg rounded-circle mb-3' >\
                                                <div class = ' mb-3 text-center'>\
                                                <h3>" + d.nomMem + " " + d.preMem + " </h3>\
                                                <div class = 'd-flex align-items-center justify-content-center' >\
                                                <h5 class = 'mb-0 mr-2 text-muted' >" + ville + "</h5>\
                                                </div>\
                                                </div>\
                                                <p class = 'w-75 mx-auto mb-3 text-center' >" + bio + "</p>\
                                                </div>\
                                                <div class = 'border-bottom py-4'>\
                                                </div>\
                                                <div class = 'py-4'>\
                                                <p class = 'clearfix'>\
                                                <span class = 'float-left'>\
                                                Sexe\
                                                </span>\
                                                <span class = 'float-right text-muted'>\
                                                <a>" + sexe + "</a> \
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                GSM\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                " + telephone + "\
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
                                                " + ville + "\
                                                </span>\
                                                </p>\
                                                <p class = 'clearfix' >\
                                                <span class = 'float-left' >\
                                                Rue\
                                                </span>\
                                                <span class = 'float-right text-muted' >\
                                                <a>" + rue + "</a>\
                                                </span>\
                                                </p>\
                                                </div>")
                            }
                        },
                        error: function(data) {
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
        <div class="result">
        </div>
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
                                                <div class="input-group rounded">
                                                    <span class="input-group-text border-0" id="search-addon">
                                                        <i class="fas fa-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                            </svg></i>
                                                    </span>
                                                    <input type="search" name="search" id="search" class="form-control rounded" Placeholder="Recherche" aria-label="Search" aria-describedby="search-addon">
                                                </div>
                                            </div>
                                            <!-- <div class="col-4">
                                                <button class="btn btn-success" id="search" type="submit">Rechercher</button>
                                            </div> -->
                                        </div>
                                    </form>

                                </div>
                                <div class="feed" id="feed">
                                </div>
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