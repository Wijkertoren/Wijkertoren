<!-- Modal voor het Toevoegen van Leden. -->
<div id="ModalAdd" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lid Toevoegen</h4>
            </div>
            <form id="2DB" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group col-sm-6">
                        <label for="Voornaam" class="col-sm-4 control-label">Voornaam</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Voornaam" placeholder="Voornaam...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Achternaam" class="col-sm-4 control-label">Achternaam</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Achternaam" placeholder="Achternaam...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Tussenvoegsel" class="col-sm-4 control-label">Tussenvoegsel</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Tussenvoegsel" placeholder="Tussenvoegsel...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Geslacht" class="col-sm-4 control-label">Geslacht</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Geslacht" placeholder="Geslacht...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Organisatie" class="col-sm-4 control-label">Organisatie</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Organisatie" placeholder="Organisatie...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="ContactPersoon" class="col-sm-4 control-label">Contact Persoon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Contact_persoon" placeholder="Contact Persoon...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Email" placeholder="Email...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="ExtraEmail" class="col-sm-4 control-label">Extra Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Extra_email" placeholder="Extra Email...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Telefoon" class="col-sm-4 control-label">Telefoon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Telefoon" placeholder="Telefoon...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Mobiel" class="col-sm-4 control-label">Mobiel</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Mobiel" placeholder="Mobiel...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Adres" class="col-sm-4 control-label">Adres</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Adres" placeholder="Adres...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Woonplaats" class="col-sm-4 control-label">Woonplaats</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Woonplaats" placeholder="Woonplaats...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Postcode" class="col-sm-4 control-label">Postcode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Postcode" placeholder="Postcode...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="ExtraInfo" class="col-sm-4 control-label">Extra Info</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Extra_info" placeholder="Extra Info...">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Donatie" class="col-sm-4 control-label">Donatie Kenmerk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Donatie_kenmerk" placeholder="Donatie Kenmerk...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="FormPostAdd" method="POST" type="submit" class="btn btn-default">Toevoegen</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
                </div>
            </form>
            <!-- /.modal-footer End -->
        </div>
        <!-- /.modal-content End -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


