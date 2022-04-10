<body>
    <?php include('partials/_header.php'); ?>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">S'inscrire</p>
                                    <!-- Mettre avec AJAX -->
                                    <?php
                                    if(isset($errors) && count($errors) !=0 ){
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Vérifier vos informations !</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><br/>';
                                            foreach($errors as $error){
                                                echo $error.'<br/>';
                                            }
                                        echo '</div>';
                                    }
                                    ?>
                                    <form method="POST">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="exampleInputEmail1">Nom</label>
                                                <input type="nom" value="<?= get_input('nom')?>" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Nom" required="required" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="exampleInputPassword1">Prenom</label>
                                                <input type="prenom" value="<?= get_input('prenom')?>" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required="required" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="exampleInputPassword1">Date de naissance</label>
                                                <input type="naissance" value="<?= get_input('naissance')?>" class="form-control" id="naissance" name="naissance" placeholder="Date de naissance" required="required" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="exampleInputPassword1">Section</label>
                                                <input type="Section" value="<?= get_input('section')?>"  class="form-control" id="section" name="section" placeholder="Section"required="required" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="exampleInputEmail1">Adresse Email</label>
                                                <input type="email" value="<?= get_input('mail')?>"  class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Adresse Email" required="required" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="exampleInputEmail1">Mot de passe:</label>
                                                <input type="psw" class="form-control" id="mdp" name="mdp" aria-describedby="emailHelp" placeholder="Mot de passe:"required="required" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="register" id="register" name="register" class="btn btn-primary">Inscription</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="image/draw1.jpg" class="img-fluid" alt="Sample image">
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