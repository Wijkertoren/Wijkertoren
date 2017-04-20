<!-- Modal voor het informatie scherm van een Lid -->
<div id="ModalLid" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lid Informatie</h4>
            </div>
            <form id="ShowMember" method="post">
            <div class="modal-body">
                <!-- Hier komt de informatie vanuit de DB te zien. -->
                <div class="form-group col-sm-6">
                    <label for="Voornaam" class="col-sm-4 control-label">Voornaam</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="VoornaamFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Achternaam" class="col-sm-4 control-label">Achternaam</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="AchternaamFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Tussenvoegsel" class="col-sm-4 control-label">Tussenvoegsel</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="TussenvoegselFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Geslacht" class="col-sm-4 control-label">Geslacht</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="GeslachtFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Organisatie" class="col-sm-4 control-label">Organisatie</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="OrganisatieFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ContactPersoon" class="col-sm-4 control-label">Contact Persoon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Contact_persoonFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="EmailFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ExtraEmail" class="col-sm-4 control-label">Extra Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="Extra_emailFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Telefoon" class="col-sm-4 control-label">Telefoon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="TelefoonFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Mobiel" class="col-sm-4 control-label">Mobiel</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="MobielFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Adres" class="col-sm-4 control-label">Adres</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="AdresFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Woonplaats" class="col-sm-4 control-label">Woonplaats</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="WoonplaatsFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Postcode" class="col-sm-4 control-label">Postcode</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="PostcodeFromDB" value="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ExtraInfo" class="col-sm-4 control-label">Zoekterm(en)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ZoektermenFromDB" placeholder="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ExtraInfo" class="col-sm-4 control-label">Donatie Kenmerk</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="DonatieKenmerkFROMDB" placeholder="">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ExtraInfo" class="col-sm-4 control-label">Extra Info</label>
                    <div class="col-sm-8">
                        <textarea type="text" rows="4" class="form-control" id="Extra_InfoFromDB" placeholder=""></textarea>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Bewerken</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
                </div>
            </form>
            <!-- /.modal-footer End -->
        </div>
        <!-- /.modal-content End -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
