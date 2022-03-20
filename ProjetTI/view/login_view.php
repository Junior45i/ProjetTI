<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>bs4 beta login - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Style/login.css">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
</head>

<body>
  <form method="POST">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group mb-0">
            <div class="card p-4">
              <div class="card-body">
                <h1>Se connecter</h1>
                <p class="text-muted">Se connecter à votre compte</p>
                <div class="input-group mb-3">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group mb-4">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Mot de passe">
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="login" id="login" name="login" class="btn btn-primary">Se connecter</button>
                  </div>
                  <div class="col-6 text-right">
                    <button type="button" class="btn btn-link px-0">Mot de passer oublié</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>S'enregistrer</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <button id ="new" name="new" type="button" class="btn btn-primary">S'enregistrer</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

</html>