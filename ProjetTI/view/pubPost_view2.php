<!-- Feuille d'ajout -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un véhicule</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="ajouter.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Type:</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                    <option value="voiture">Voiture / Mixtes / Minibus</option>
                                    <option value="cycle">Motocyclette / Tricycles / Quadricycles</option>
                                    <option value="speciaux">Remorque camping bateau / Ancêtres / Militaire</option>
                                    <option value="remorque">Remorque</option>
                                    <option value="autocars">Autocars / Autobus</option>
                                    <option value="utilitaire">Véhicule utilitaire</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Plaque:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="plaque">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Cylindrée:</label>
                            </div>
                            <div class="col-sm-10">
                                <input value="0" type="number" class="form-control" name="cylindre">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Puissance:</label>
                            </div>
                            <div class="col-sm-10">
                                <input value="0" type="number" class="form-control" name="puissance">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">MMA:</label>
                            </div>
                            <div class="col-sm-10">
                                <input value="0" type="number" class="form-control" name="poid">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-check form-switch">
                                <div class="col-sm-2">
                                    <label class="form-check-label" for="flexSwitchCheckDefault" style=" position:relative; top:7px;">LPG</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="checkbox" name="lpg" id="flexSwitchCheckDefault" class="form-check-input"></input>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                    <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Sauvegarder</a>
                        </form>
                </div>
            </div>
        </div>
    </div>