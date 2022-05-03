<?php
session_start();
// include('filters/auth_filter.php');
include('includes/fonctions.php'); ?>


<body style="background-color: #eee;">
    <?php include('partials/_header.php'); ?>
    <script>
        $(document).ready(function() {
            $(function() {
                $("#naissance").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeYear: true,
                    changeMonth: true,
                    yearRange: "-40:-0"
                });
            });
            $("#register").click(function() {
                $.ajax({
                    url: 'register.php',
                    type: 'POST',
                    dataType: "text",
                    data: {
                        myFunction: 'register',
                        myParams: {
                            nom: $("#nom").val(),
                            prenom: $("#prenom").val(),
                            naissance: $("#naissance").val(),
                            section: $("#section").val(),
                            mail: $("#mail").val(),
                            mdp: $("#mdp").val()
                        }
                    },
                    async: false,
                    success: function(result) {
                        location.href = 'login_view.php';
                    },
                    error: function(result) {
                    }
                })
            });
        })
    </script>
    <section>
        <div class="container h-75" style="margin-top: +80px" id="test">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">S'inscrire</p>
                                    <!-- Mettre avec AJAX -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="nom" value="<?= get_input('nom') ?>" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Nom" required="required" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="prenom" value="<?= get_input('prenom') ?>" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required="required" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="naissance" value="<?= get_input('naissance') ?>" class="form-control" id="naissance" name="naissance" placeholder="Date de naissance" required="required" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="Section" value="<?= get_input('section') ?>" class="form-control" id="section" name="section" placeholder="Section" required="required" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" value="<?= get_input('mail') ?>" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Adresse Email" required="required" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="psw" class="form-control" id="mdp" name="mdp" aria-describedby="emailHelp" placeholder="Mot de passe:" required="required" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-5 mb-lg-4">
                                        <button type="register" id="register" name="register" class="btn btn-primary btn-lg">Inscription</button>
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <h5>
                                        <img src="image/logo.png" class="img-fluid" alt="Sample image">

                                        GossipHelha est le réseau social des étudiants de la helha.<br>
                                        Qui dit étudiants dit également potins.<br>
                                        Grâce à cette plateforme, vous avez la possibilité de découvrir, tisser des liens d'amitiés, échanger etc avec des étudiants.<br>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>