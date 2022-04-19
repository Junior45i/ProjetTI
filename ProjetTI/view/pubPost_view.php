<body style="background-color: #eee;">
    <?php include('partials/_header.php'); ?>
    <section class="vh-100">
        <div class="container h-100" style="margin-top: +100px">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-10 col-xl-10">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">POSTS</p>
                                    <form method="POST" autocomplete="off">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label>Titre du post</label>
                                                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Titre du post" required="required" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="sTate">Contenu du post</label>
                                                <textarea cols="30" rows="5" type="text" name="content" id="content" class="form-control" id="bio" placeholder="Contenu"> </textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="login" id="publier" name="publier" class="btn btn-primary">Publier</button>
                                        </div>
                                    </form>
                                </div>
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