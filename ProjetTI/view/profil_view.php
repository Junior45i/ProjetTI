<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Profil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
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
								<h5 class="user-name"><?= $_SESSION['pseudo']?></h5>
								<h6 class="user-email">
									<a href=""><?=$user->mail?></a>	
								</h6>
							</div>
							<div class="about">
								<h5>A propos</h5>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur laudantium praesentium ipsam temporibus quis nostrum deleniti laborum voluptatem saepe! Corporis amet, nihil at doloribus sint est reprehenderit dicta ut sed!</p>
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
							<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="fullName">Nom</label>
									<input type="text" class="form-control" id="fullName" placeholder="Enter full name">
								</div>
							</div> -->
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="annee">Année Scolaire</label>
									<input type="annee" class="form-control" name="section" id="annee" placeholder="Année scolaire en cours">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="phone">Téléphone</label>
									<input type="text" class="form-control" name="tel" id="phone" placeholder="Enter phone number">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<!-- <div class="form-group">
					<label for="website">Website URL</label>
					<input type="url" class="form-control" id="website" placeholder="Website url">
				</div>
			</div> -->
							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mt-3 mb-2 text-primary">Address</h6>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="Street">Rue</label>
										<input type="name" class="form-control" name="rue" id="Street" placeholder="Enter Street">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="ciTy">Ville</label>
										<input type="name" class="form-control" name="ville" id="ciTy" placeholder="Enter City">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="form-group">
										<label for="sTate">Biographie</label>
										<textarea cols="30" rows="5" type="text" name="bio" class="form-control" id="" placeholder="Enter State"> </textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class=" text-right">
										<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">
		body {
			margin: 0;
			padding-top: 40px;
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

		.account-settings .user-profile .user-avatar {
			margin: 0 0 1rem 0;
		}

		.account-settings .user-profile .user-avatar img {
			width: 90px;
			height: 90px;
			-webkit-border-radius: 100px;
			-moz-border-radius: 100px;
			border-radius: 100px;
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

	<script type="text/javascript">

	</script>
</body>

</html>