<?php
//Page de login
session_start();
include('filters/guest_filter.php');
include('includes/fonctions.php');
include('partials/_header.php'); ?>

<body>
  <section>
    <script>
      $(document).ready(function() {
        $("#login").click(function() {
          $.ajax({
            url: 'login.php',
            type: 'POST',
            data: {
              myFunction: 'connecter',
              myParams: {
                email: $("#email").val(),
                mdp: $("#mdp").val()
              }
            },
            async: false,
            success: function(result) {
              if (result == "success") {
                // Redirection automatisée car id attribué sur variable de
                window.location.href = "profil";
              } else {
                $("#alert").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'> \
              <strong> Combinaison mot de passe/ identifiant incorrecte </strong>\
              <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
              }
            },
            error: function(result) {
              $("#alert").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'> \
              <strong> une erreur est survenue</strong>\
              <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
            }
          })
        })
      })
    </script>

    <div class="container h-75" style="margin-top: +50px">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="alert" id="alert"></div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Se connecter</p>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" value="<?= get_input('email') ?>" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Adresse Email" required="required" />
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe" required="required" />
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="login" id="login" name="login" class="btn btn-primary btn-lg">Se connecter</button>
                  </div>
                  <hr class="mt-4">
                  <br>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <a href="inscription" type="redirection" id="inscription" name="inscription" class="btn btn-success">Créer un nouveau compte</a>
                  </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="image/logo.png" class="img-fluid" alt="Sample image">
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