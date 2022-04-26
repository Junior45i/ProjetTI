  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="../pubPost.php" autocomplete="off">
                  <div class="modal-body">

                      <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                              <label>Titre du post</label>
                              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Titre du post" required="required" />
                          </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                              <label>Contenu du post</label>
                              <textarea cols="30" rows="5" type="text" name="content" id="content" class="form-control" id="bio" placeholder="Contenu"> </textarea>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="login" id="publier" name="publier" class="btn btn-primary">Publier</button>
                    </div>
                </form>
      </div>
  </div>
  </div>