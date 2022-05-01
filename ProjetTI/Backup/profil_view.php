<body>
	<?php include('partials/_header.php'); ?>
	<div class="container">
		<div class="row gutters">
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings">
							<div class="user-profile">
								<div class="user-avatar">
									<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
								</div>
								<!-- TODO Rendre invisible et affichage avec ajax  (19)-->
								<strong>
									<h3 class="user-name" id="preMem"><?= e($user->preMem) ?></h3>
								</strong>
								<h3 class="user-mail" id="mail"><?= e($user->mail) ?></h3>
							</div>
							<div class="about" id="about">
								<h5>A propos</h5>
								<p><?= e($user->bio) ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<h6 class="mb-2 text-primary">Détail personnel</h6>
							</div>
							<form method="POST" autocomplete="off">
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
										<input type="text" class="form-control" name="telephone" id="telephone" placeholder="Enter phone number">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

								</div>
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<h6 class="mt-3 mb-2 text-primary">Address</h6>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label for="Street">Rue</label>
											<input type="name" class="form-control" name="rue" id="rue" placeholder="Enter Street">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label for="ciTy">Ville</label>
											<input type="name" class="form-control" name="ville" id="ville" placeholder="Enter City">
										</div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<label for="sTate">Biographie</label>
											<textarea cols="30" rows="5" type="text" name="bio" class="form-control" id="bio" placeholder="Enter State"> </textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class=" text-right">
												<button type="submit" id="update" name="update" class="btn btn-secondary">Valider</button>
											</div>
										</div>
									</div>
									<!-- Mettre en ajax -->
									<!-- <?php
											if (isset($errors) && count($errors) != 0) {
												echo '<div class="alert alert-success alert-dismissible fade show" role="success">
                                                <button type="button" class="btn-close" data-bs-dismiss="success" aria-label="Close"></button><br/>';
												foreach ($errors as $error) {
													echo $error . '<br/>';
												}
												echo '</div>';
											}
											?> -->
								</div>
							</form>
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
</style>