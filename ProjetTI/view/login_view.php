<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/jquery-ui.css">
    <script src="lib/jquery-3.6.0.js"></script>
    <script src="lib/jquery-ui.js"></script>
    <title>Connection</title>
</head>
<body>
    
        <!-- <div class="container vh-50 align">
            <form method="POST" action="">
                <div class="form-group" action="" method="post">
                    <input name="nomUser" id="" type="text" class="form-control" placeholder="Adresse mail" >
                </div>
                <div class="form-group">
                    <input name='sal' type="password" class="form-control" id="sal" placeholder="PassWord">
                </div>
                <button type="submit" value="Se connecter" class="btn btn-primary">Se connecter</button>
            </form>
        </div> -->

        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                  <div class="card rounded-3 text-black">
                    <div class="row g-0">
                      <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">
          
                          <div class="text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                          </div>
          
                          <form method="post" action="requetes.php">
                            <p>Please login to your account</p>
          
                            <div class="form-outline mb-4">
                              <input type="email" id="email" name="email" class="form-control" placeholder="email address" name="nomUser"/>
                              <label class="form-label" for="form2Example11">Email</label>
                            </div>
          
                            <div class="form-outline mb-4">
                              <input type="password" id="mdp" name="mdp" class="form-control" name="pwdUser" />
                              <label class="form-label" for="form2Example22">Password</label>
                            </div>
          
                            <div class="text-center pt-1 mb-5 pb-1">
                              <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="login" id="login" type="button">Log in</button>
                              <a class="text-muted" href="#!">Forgot password?</a>
                            </div>
          
                            <div class="d-flex align-items-center justify-content-center pb-4">
                              <p class="mb-0 me-2">Don't have an account?</p>
                              <button type="button" class="btn btn-outline-danger">Create new</button>
                            </div>
          
                          </form>
          
                        </div>
                      </div>
                      <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                          <h4 class="mb-4">We are more than just a company</h4>
                          <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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