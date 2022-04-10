<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>GossipHelha Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/lib/jquery-ui.css">
    <script src="/lib/jquery-3.6.0.js"></script>
    <script src="/lib/jquery-ui.js"></script>
</head>

<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GossipHelha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index1.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Connection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Inscription</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="login-box">
                        <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Se connecter</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'enregistrer</label>
                            <div class="login-space">
                                <div class="login">
                                    <div class="group"> <label for="user" class="label">Adresse mail</label> <input id="user" type="text" class="input" placeholder="Insérer votre adresse mail"> </div>
                                    <div class="group"> <label for="pass" class="label">Mot de passe</label> <input id="pass" type="password" class="input" data-type="password" placeholder="Insérer votre mot de passe"> </div>
                                    <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span> Rester connecté</label> </div>
                                    <div class="group"> <input type="submit" class="button" value="Se connecter"> </div>
                                    <div class="hr"></div>
                                    <div class="foot"> <a href="#">Mot de passe oublié ? </a> </div>
                                </div>
                                <div class="sign-up-form">
                                    <div class="group"> <label for="user" class="label">Nom</label> <input id="user" type="text" class="input" placeholder="Insérer votre nom"> </div>
                                    <div class="group"> <label for="pass" class="label">Prenom</label> <input id="user" type="text" class="input" placeholder="Insérer votre prénom"> </div>
                                    <div class="group"> <label for="pass" class="label">Date de naissance</label> <input id="user" type="text" class="input" placeholder="Insérer votre date de naissance"> </div>
                                    <div class="group"> <label for="pass" class="label">Section</label> <input id="user" type="text" class="input" placeholder="Insérer votre section"> </div>
                                    <div class="group"> <label for="pass" class="label">Adresse mail</label> <input id="user" type="text" class="input" placeholder="Insérer votre adresse email"> </div>
                                    <div class="group"> <label for="pass" class="label">Mot de passe</label> <input id="pass" type="password" class="input" data-type="password" placeholder="Insérer un mot de passe"> </div>

                                    <div class="group"> <button type="register" id="register" class="button" value="Sign Up">Inscription</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>