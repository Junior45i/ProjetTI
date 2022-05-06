<head>
    <link rel="icon" type="image/png" sizes="16x16" href="image/logoDetour.png">
</head>
<body>
	<?php session_start();
	include('filters/auth_filter.php');
	include('includes/fonctions.php');
	include('partials/_header.php'); ?>

	<script>
		// Affichage d'un profil
		$(document).ready(function() {
			$(function() {
				$.ajax({
					url: 'profil.php',
					type: 'POST',
					data: {
						myFunction: 'afficherProfil',
					},
					async: false,
					dataType: 'json',
					success: function(data) {
						for (var d of data) {
							var bio = d.bio == null ? '' : d.bio;
							$("#account-settings").html("<div class='user-profile'>\
								<div class='user-avatar'>\
									<img src='https://bootdey.com/img/Content/avatar/avatar7.png'>\
								</div>\
									<h3 class='user-name' id='preMem'> " + d.preMem + "</h3>\
								<h6 class='user-mail' id='mail'>" + d.mail + "</h6>\
							</div>\
							<div class='about' id='about'>\
								<h5>A propos</h5>\
								<p> " + bio + "</p>\
							</div>");
							var preMem = d.preMem;
							var mail = d.mail;
							var rue = d.rue;
							var telephone = d.telephone;
							var ville = d.ville;
							var bio = d.bio;
							var sexe = d.sexe;
							// Condition pour le sexe de la personne
							if (sexe == "H") {
								$("#sexe").val('H');
							} else {
								$("#sexe").val('F');
							}
							// Récupère les val des inputs
							$("#rue").val(rue)
							$("#telephone").val(telephone)
							$("#ville").val(ville)
							$("#bio").val(bio)
						}
						// update en db les infos
						$("#update").click(function() {
							$.ajax({
								url: 'profil.php',
								type: 'POST',
								data: {
									myFunction: 'update',
									myParams: {
										ville: $("#ville").val(),
										rue: $("#rue").val(),
										bio: $("#bio").val(),
										sexe: $("#sexe").val(),
										telephone: $("#telephone").val(),
									}
								},
								async: false,
								dataType: 'text',
								success: function(data) {
									bio = $("#bio").val();
									$("#alert").html("<div class='alert alert-success alert-dismissible fade show' role='alert'> \
                                                                        <strong> Profil mis à jour </strong>\
                                                                        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
									$("#account-settings").html("<div class='user-profile'>\
								<div class='user-avatar'>\
									<img src='https://bootdey.com/img/Content/avatar/avatar7.png'>\
								</div>\
									<h3 class='user-name' id='preMem'> " + d.preMem + "</h3>\
								<h6 class='user-mail' id='mail'>" + d.mail + "</h6>\
							</div>\
							<div class='about' id='about'>\
								<h5>A propos</h5>\
								<p> " + bio + "</p>\
							</div>");

								},
								error: function(result) {
										$("#alert").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'> \
                                                                        <strong> Un problème est survenu </strong>\
                                                                        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
								}
							})
						})
					},
					error: function(result) {
							$("#account-settings").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'> \
                                                                        <strong> Un problème est survenu </strong>\
                                                                        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
					}
				})
			})
		})
	</script>
	<div class="container">
		<div class="row gutters">
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings" id="account-settings">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="alert">
								<h6 class="mb-2 text-primary">Détails personnels</h6>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="annee">Sexe</label>
									<select name="sexe" id="sexe" class="form-select" aria-label="Default select example">
										<option value="H">Homme</option>
										<option value="F">Femme</option>
									</select>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="phone">Téléphone</label>
									<input type="text" class="form-control" name="telephone" id="telephone" placeholder="Entrer un numéro de téléphone">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mt-3 mb-2 text-primary">Adresse</h6>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="Street">Rue</label>
										<input type="name" class="form-control" name="rue" id="rue" placeholder="Entrer une rue" value="">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="ciTy">Ville</label>
										<input type="name" class="form-control" name="ville" id="ville" placeholder="Entrer une ville">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<label for="sTate">Biographie</label>
										<textarea cols="30" rows="5" type="text" name="bio" class="form-control" id="bio" placeholder=""> </textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class=" text-right">
											<button type="submit" id="update" name="update" class="btn btn-secondary">Valider</button>
										</div>
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

<!-- CSS de la page -->
<style type="text/css">
	body {
		margin: 0;
		color: #2e323c;
		background: #f5f6fa;
		position: relative;
		height: 100%;
	}

	.account-settings .user-profile {
		margin: 0 0 1rem 0;
		padding-bottom: 1rem;
		text-align: center;
	}


	.account-settings .user-profile h5.user-name {
		margin: 0 0 0.5rem 0;
	}

	.account-settings .user-profile h6.user-email {
		margin: 0;
		font-size: 0.8rem;
		font-weight: 400;
		color: #9fa8b9;
	}

	.account-settings .about {
		margin: 2rem 0 0 0;
		text-align: center;
	}

	.account-settings .about h5 {
		margin: 0 0 15px 0;
		color: #007ae1;
	}

	.account-settings .about p {
		font-size: 0.825rem;
	}

	.form-control {
		border: 1px solid #cfd1d8;
		-webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px;
		font-size: .825rem;
		background: #ffffff;
		color: #2e323c;
	}

	.card {
		background: #ffffff;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		border: 0;
		margin-bottom: 1rem;

	}

	textarea {
		resize: none;
	}
</style>