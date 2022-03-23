<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotHelha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>Devenez membre HELHA</h1>
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input type="nom" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Prenom</label>
            <input type="prenom" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Date de naissance</label>
            <input type="naissance" class="form-control" id="naissance" name="naissance" placeholder="Date de naissance">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Section</label>
            <input type="Section" class="form-control" id="section" name="section" placeholder="Section">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Adresse Email</label>
            <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Adresse Email">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mot de passe:</label>
            <input type="psw" class="form-control" id="mdp" name="mdp" aria-describedby="emailHelp" placeholder="Mot de passe:">

        </div>
        <button type="register" id="register" name="register" class="btn btn-primary">Inscription</button>
    </form>
</body>
</html>