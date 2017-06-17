<div id="grid"></div>

<div class="modal fade" id="popup_0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-0" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-0">Alerte de relance facture</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div>Société : <span id="popup_societe"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">Solde dû : <span id="popup_ttc" style="color:red"></span> € TTC</div>
                    </div>
                </div>
                <div><small>N° facture : <span id="popup_numero" style="color:red"></span>
                    - Date facture : <span id="popup_datefac" style="color:red"></span></small></div>
                <div class="hidden" id="popup_fac_id"></div>
                <hr />
                <form>
                    <input type="hidden" id="popup_info">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=popup_date"><small>Date</small></label>
                                <input type="text" class="form-control input-sm" id="popup_date" value="<?php echo date('d/m/Y')?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=popup_heure"><small>Heure (hhmm)</small></label>
                                <input type="text" class="form-control input-sm" id="popup_heure" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=popup_comment"><small>Remarques</small></label>
                        <textarea class="form-control input-sm" rows="5" id="popup_comment"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="popup_creer_rappel">Créer</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" id="popup_modifier_rappel">Modifier</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="popup_supprimer_rappel">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-1">Edition de la zone "remarques"</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for=popup_comment"><small>Remarques</small></label>
                        <textarea class="form-control input-sm" rows="5" id="popup_1_notes"></textarea>
                    </div>
                    <div class="hidden" id="popup_1_fac_id"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="popup_1_sauver">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-2">Ajout d'un référé</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for=popup_date"><small>Date</small></label>
                        <input type="text" class="form-control input-sm" id="popup_date_refere" value="<?php echo date('d/m/Y')?>">
                    </div>
                    <div class="form-group">
                        <label for=popup_refere"><small>Information</small></label>
                        <select class="form-control input-sm" id="popup_refere">
<?php foreach ($referes as $r) { ?>
        <option><?php echo $r->vrf_label ?></option>
<?php }?>
                        </select>
                    </div>
                    <div class="hidden" id="popup_2_fac_id"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="popup_2_sauver">Ajouter</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popup_reglage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-reglage" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-reglage">Organisation des colonnes</h4>
            </div>
            <div class="modal-body">
                <div class="checkbox"><label><input type="checkbox" id="toutes_colonnes" value="">Tout cocher / décocher</label></div>
                <small>Décochez pour masquer, glissez-déposez pour changer l'ordre d'affichage</small>
                <ul id="liste_colonnes" class="list-unstyled">
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="popup_reglage_sauver">Appliquer</button>
            </div>
        </div>
    </div>
</div>

<!-- div class="modal fade" id="popup_suppression" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-suppression" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-suppression">Confirmation de suppression</h4>
            </div>
            <div class="modal-body">
                Veuillez confirmer la suppression.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="popup_suppr_do">Supprimer</button>
            </div>
        </div>
    </div>
</div -->

