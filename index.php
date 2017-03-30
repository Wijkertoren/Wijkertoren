<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Wijkertoren Ledenregister</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/database.css" rel="stylesheet" type="text/css">
        <link href="css/dataTablesjQuery.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.0.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="js/data-tables.min.js"></script>

        <?php
        include 'connection.php';
        include 'ADDmember.php';
        include 'ShowMember.php';
        ?>

        <div class="container" id="maincontainer">
            <div class="panel">
                <div class="panel-heading">
                    <h1>LedenRegister 2.0</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table id="example" class="display compact" cellspacing="10" width="100%">
                            <thead>
                                <tr>
                                    <!--Headers of the table-->
                                    <th>Lid nr</th>
                                    <th>Email</th>
                                    <th>Voornaam</th>
                                    <th>Achternaam</th>
                                    <th>Tussenvoegsel</th>
                                    <th>Geslacht</th>
                                    <th>Organisatie</th>
                                    <th>Contact nr</th>
                                    <th>Extra email</th>
                                    <th>Telefoon</th>
                                    <th>Mobiel</th>
                                    <th>Adres</th>
                                    <th>Woonplaats</th>
                                    <th>Postcode</th>
                                    <th>Tags</th>
                                    <th>Donatie</th>
                                    <th>Kenmerk</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Lid nr</th>
                                    <th>Email</th>
                                    <th>Voornaam</th>
                                    <th>Achternaam</th>
                                    <th>Tussenvoegsel</th>
                                    <th>Geslacht</th>
                                    <th>Organisatie</th>
                                    <th>Contact nr</th>
                                    <th>Extra email</th>
                                    <th>Telefoon</th>
                                    <th>Mobiel</th>
                                    <th>Adres</th>
                                    <th>Woonplaats</th>
                                    <th>Postcode</th>
                                    <th>Tags</th>
                                    <th>Donatie</th>
                                    <th>Kenmerk</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $queryleden = "SELECT Lid_nr, Email, Voornaam, Achternaam, Tussenvoegsel, Geslacht, Extra_email, Telefoon, Mobiel, "
                                        . "Adres, Woonplaats, Postcode, Extra_info "
                                        . "FROM ledenregister lid, personen p "
                                        . "WHERE lid.Persoon_nr = p.Persoon_nr";
                                $queryorganisatie = "SELECT Lid_nr, Email, Organisatie_naam, Contact_persoon, Extra_email, Telefoon, Mobiel, "
                                        . "Adres, Woonplaats, Postcode, Extra_info "
                                        . "FROM ledenregister lid, organisaties org "
                                        . "WHERE lid.Organisatie_nr = org.Organisatie_nr";

                                if ($result = mysqli_query($con, $queryleden)) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<td>" . $row["Lid_nr"] . "</td>"
                                        . "<td>" . $row["Email"] . "</td>"
                                        . "<td>" . $row["Voornaam"] . "</td>"
                                        . "<td>" . $row["Achternaam"] . "</td>"
                                        . "<td>" . $row["Tussenvoegsel"] . "</td>"
                                        . "<td>" . $row["Geslacht"] . "</td>"
                                        . "<td> </td>"
                                        . "<td> </td>"
                                        . "<td>" . $row["Extra_email"] . "</td>"
                                        . "<td>" . $row["Telefoon"] . "</td>"
                                        . "<td>" . $row["Mobiel"] . "</td>"
                                        . "<td>" . $row["Adres"] . "</td>"
                                        . "<td>" . $row["Woonplaats"] . "</td>"
                                        . "<td>" . $row["Postcode"] . "</td>"
                                        . "<td>" . $row["Extra_info"] . "</td>";
                                        //Donatie info voor deze rij.
                                        // Voor zekerheid als de query niet werkt, komen er 2 lege cellen.
                                        $querybetalingen = "SELECT Datum_donatie, Donatie_kenmerk "
                                                . "FROM donaties "
                                                . "WHERE Lid_nr = " . $row["Lid_nr"];
                                        if ($resultDonatie = mysqli_query($con, $querybetalingen)) {
                                            if ($resultDonatie->num_rows === 0) {
                                                echo "<td> </td>"
                                                . "<td> </td>";
                                            } else {
                                                while ($row = mysqli_fetch_array($resultDonatie)) {
                                                    if ($row["Datum_donatie"] != 0000 - 00 - 00) {
                                                        echo "<td>" . $row["Datum_donatie"] . "</td>";
                                                    } else {
                                                        echo "<td> </td>";
                                                    }
                                                    echo "<td>" . $row["Donatie_kenmerk"] . "</td>";
                                                }
                                            }
                                        } else {
                                            echo "<td> </td>"
                                            . "<td> </td>";
                                        }
                                        echo "</tr>";
                                    }
                                } else {
                                    
                                }
                                if ($result = mysqli_query($con, $queryorganisatie)) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<td>" . $row["Lid_nr"] . "</td>"
                                        . "<td>" . $row["Email"] . "</td>"
                                        . "<td> </td>"
                                        . "<td> </td>"
                                        . "<td> </td>"
                                        . "<td> </td>"
                                        . "<td>" . $row["Organisatie_naam"] . "</td>"
                                        . "<td>" . $row["Contact_persoon"] . "</td>"
                                        . "<td>" . $row["Extra_email"] . "</td>"
                                        . "<td>" . $row["Telefoon"] . "</td>"
                                        . "<td>" . $row["Mobiel"] . "</td>"
                                        . "<td>" . $row["Adres"] . "</td>"
                                        . "<td>" . $row["Woonplaats"] . "</td>"
                                        . "<td>" . $row["Postcode"] . "</td>"
                                        . "<td>" . $row["Extra_info"] . "</td>";

                                        $querybetalingen = "SELECT Datum_donatie, Donatie_kenmerk "
                                                . "FROM donaties "
                                                . "WHERE Lid_nr = " . $row["Lid_nr"];
                                        if ($resultDonatie = mysqli_query($con, $querybetalingen)) {
                                            if ($resultDonatie->num_rows === 0) {
                                                echo "<td> </td>"
                                                . "<td> </td>";
                                            } else {
                                                while ($row = mysqli_fetch_array($resultDonatie)) {
                                                    echo "<td>" . $row["Datum_donatie"] . "</td>"
                                                    . "<td>" . $row["Donatie_kenmerk"] . "</td>";
                                                }
                                            }
                                        } else {
                                            echo "<td>...</td>"
                                            . "<td>...</td>";
                                        }
                                        echo "</tr>";
                                    }
                                } else {
                                    
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="testing"></div>
                    <!-- Trigger the modal with a button -->
                    <div class="col-sm-12" id="mainBTNcontainer">
                        <div class="col-sm-10">
                            <button id="ToevoegenLidModal" name ="ToevoegenLidModal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalAdd">Lid Toevoegen</button>
                            <button id="LidModal" name="LidModal" type="button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#ModalLid" disabled>Lid informatie</button>
                            <button id="EmailModal" name ="EmailModal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalEmail" disabled>Email Lid</button>
                        </div>
                        <div class="col-sm-2">
                            <button id="VerwijderLidModal" name ="VerwijderLidModal" type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#DeleteMemberModal" disabled>Verwijder Lid</button>
                        </div>
                    </div>
                </div>

                <!-- Modal voor het versturen van de emails naar de leden -->
                <div id="ModalEmail" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Email Leden</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                //hier database informatie ;)
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Email</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
                            </div>
                            <!-- /.modal-footer End -->
                        </div>
                        <!-- /.modal-content End -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

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
                                    <form id="DeletefromDB" method="post">
                                        <button type="submit" class="btn btn-danger">Ja</button>
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
            </div>
        </div>
    </body>
    <script src="js/registreer.js"></script>
    <script src="js/selectieScript.js"></script>
</html>
