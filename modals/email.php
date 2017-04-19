<!-- Modal voor het versturen van de emails naar de leden -->
<div id="ModalEmail" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Email Leden</h4>
            </div>
            <form id="emailLid" method="post">
            <div class="modal-body">
                    Email ontvanger: <input id="EmailFROMDB" type="text" value="" name="naar_emailadres"><br /><br />
                    <!--Naam verzender: <input type="text" name="van_naam"><br /><br />-->
                    <!--Email verzender: <input type="text" name="van_emailadres" ><br /><br />-->
                    <!--<input type="text" class="form-control" id="Achternaam" placeholder="Achternaam...">-->
                    Onderwerp: <input type="text" class="form-control" name="onderwerp"><br />
                    bericht:<br />
                    <textarea name="bericht_verzender" rows="7" class="form-control"></textarea>
                    <br /><br />

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $email_ontvanger = $_POST['naar_emailadres'];

                        $naam_verzender = 'Wijkertoren';
                        $email_verzender = 'jorrit.verh@gmail.com';
                        $onderwerp = $_POST['onderwerp'];
                        $bericht_verzender = $_POST['bericht_verzender'];
                        $headers = "From: " . $naam_verzender . " <" . $email_verzender . "> ";
                        $bericht =   $bericht_verzender ; //einde bericht


                        $naam_verzender = 'Wijkertoren';
                        $email_verzender = 'jorrit.verh@gmail.com';

                        $onderwerp = $_POST['onderwerp'];
                        $bericht_verzender = $_POST['bericht_verzender'];


                        $headers = "From: " . $naam_verzender . " <" . $email_verzender . "> ";

                        $bericht =   $bericht_verzender ; //einde bericht


                        mail($email_ontvanger, $onderwerp, $bericht, $headers);
                    }
                    ?>


            </div>
            <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-default" value="Email versturen">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
            </div>
            <!-- /.modal-footer End -->
            </form>
        </div>
        <!-- /.modal-content End -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

