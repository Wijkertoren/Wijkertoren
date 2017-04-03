<!-- Modal voor het verwijderen van Leden -->
<div id="DeleteMemberModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="Verwijderleden" class="modal-title">Leden Verwijderen</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-4">
                    <!-- vrije ruimte om de text in het midden te krijgen -->
                </div>
                <div class="col-sm-6">
                    <label class="center-block control-label" id="Verwijderen">Weet u zeker dat u dit lid wilt verwijderen?</label>
                </div>
            </div>
            <form id="DeleteLid" method="post">
                <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" onclick="number.forEach(test)">Ja</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Nee</button>
                </div>
            </form>
            <!-- /.modal-footer End -->
        </div>
        <!-- /.modal-content End -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php