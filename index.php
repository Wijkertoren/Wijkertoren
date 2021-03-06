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
    <link href="css/heroheader.css" rel="stylesheet" type="text/css">
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
include 'modals/add.php';
include 'modals/delete.php';
include 'modals/email.php';
include 'modals/show.php';
?>

<div class="carousel fade-carousel slide" data-interval="10000" data-ride="carousel" id="bs-carousel">
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item slides active">
            <div class="slide-1"></div>
            <div class="hero">
                <hgroup>
                    <h1>LedenRegister Wijkertoren</h1>
                </hgroup>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2"></div>
            <div class="hero">
                <hgroup>
                    <h1>LedenRegister Wijkertoren</h1>
                </hgroup>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3"></div>
            <div class="hero">
                <hgroup>
                    <h1>LedenRegister Wijkertoren</h1>
                </hgroup>
            </div>
        </div>
    </div>
</div>

<div class="container" id="maincontainer">
    <div class="panel">
        <!--<div class="panel-heading">
            <h1>LedenRegister 2.0</h1>
        </div>-->

        <div class="panel-body boxshadow">
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
                    $queryleden = "SELECT Lid_nr, lid.Persoon_nr, Email, Voornaam, Achternaam, Tussenvoegsel, Geslacht, Extra_email, Telefoon, Mobiel, "
                        . "Adres, Woonplaats, Postcode, Extra_info "
                        . "FROM ledenregister lid, personen p "
                        . "WHERE lid.Persoon_nr = p.Persoon_nr";
                    $queryorganisatie = "SELECT Lid_nr, lid.Organisatie_nr, Email, Organisatie_naam, Contact_persoon, Extra_email, Telefoon, Mobiel, "
                        . "Adres, Woonplaats, Postcode, Extra_info "
                        . "FROM ledenregister lid, organisaties org "
                        . "WHERE lid.Organisatie_nr = org.Organisatie_nr";

                    if ($result = mysqli_query($con, $queryleden)) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo PHP_EOL . '            <tr data-organisatienr="0" data-id="' . $row["Lid_nr"] . '" data-persoonnr="' . $row["Persoon_nr"] . '">' . PHP_EOL;
                            echo '                 <td>' . $row["Lid_nr"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Email"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Voornaam"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Achternaam"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Tussenvoegsel"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Geslacht"] . '</td>' . PHP_EOL
                                . '                 <td> </td>' . PHP_EOL
                                . '                 <td> </td>' . PHP_EOL
                                . '                 <td>' . $row["Extra_email"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Telefoon"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Mobiel"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Adres"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Woonplaats"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Postcode"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Extra_info"] . '</td>' . PHP_EOL;
                            //Donatie info voor deze rij.
                            // Voor zekerheid als de query niet werkt, komen er 2 lege cellen.
                            $querybetalingen = "SELECT Datum_donatie, Donatie_kenmerk "
                                . "FROM donaties "
                                . "WHERE Lid_nr = " . $row["Lid_nr"];
                            if ($resultDonatie = mysqli_query($con, $querybetalingen)) {
                                if ($resultDonatie->num_rows === 0) {
                                    echo '                 <td> </td>' . PHP_EOL
                                        . '                 <td> </td>' . PHP_EOL;
                                } else {
                                    while ($row = mysqli_fetch_array($resultDonatie)) {
                                        if ($row["Datum_donatie"] != 0000 - 00 - 00) {
                                            echo '                 <td>' . $row["Datum_donatie"] . '</td>' . PHP_EOL;
                                        } else {
                                            echo '                  <td> </td>' . PHP_EOL;
                                        }
                                        echo '                 <td>' . $row["Donatie_kenmerk"] . '</td>' . PHP_EOL;
                                    }
                                }
                            } else {
                                echo '              <td> </td>' . PHP_EOL
                                    . '                 <td> </td>' . PHP_EOL;
                            }
                            echo '            </tr>' . PHP_EOL;
                        }
                    } else {

                    }
                    if ($result = mysqli_query($con, $queryorganisatie)) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo PHP_EOL . '            <tr data-persoonnr="0" data-id="' . $row["Lid_nr"] . '" data-organisatienr="' . $row["Organisatie_nr"] . '">' . PHP_EOL;
                            echo '                 <td>' . $row["Lid_nr"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Email"] . '</td>' . PHP_EOL
                                . '                 <td> </td>' . PHP_EOL
                                . '                 <td> </td>' . PHP_EOL
                                . '                 <td> </td>' . PHP_EOL
                                . '                 <td> </td>' . PHP_EOL
                                . '                 <td>' . $row["Organisatie_naam"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Contact_persoon"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Extra_email"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Telefoon"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Mobiel"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Adres"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Woonplaats"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Postcode"] . '</td>' . PHP_EOL
                                . '                 <td>' . $row["Extra_info"] . '</td>' . PHP_EOL;

                            $querybetalingen = "SELECT Datum_donatie, Donatie_kenmerk "
                                . "FROM donaties "
                                . "WHERE Lid_nr = " . $row["Lid_nr"];
                            if ($resultDonatie = mysqli_query($con, $querybetalingen)) {
                                if ($resultDonatie->num_rows === 0) {
                                    echo '                 <td> </td>' . PHP_EOL
                                        . '                 <td> </td>' . PHP_EOL;
                                } else {
                                    while ($row = mysqli_fetch_array($resultDonatie)) {
                                        echo '                 <td>' . $row["Datum_donatie"] . '</td>' . PHP_EOL
                                            . '                 <td>' . $row["Donatie_kenmerk"] . '</td>' . PHP_EOL;
                                    }
                                }
                            } else {
                                echo '              <td>...</td>' . PHP_EOL
                                    . '                 <td>...</td>' . PHP_EOL;
                            }
                            echo '          </tr>' . PHP_EOL;
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
                <div class="col-sm-9">
                    <!-- Button opening the modal for adding Members. -->
                    <button id="ToevoegenLidModal" name="ToevoegenLidModal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalAdd">Lid Toevoegen</button>
                    <!-- /.Button opening the modal for adding Members. -->

                    <!-- Button opening the modal for showing Member information. -->
                    <button id="LidModal" name="LidModal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalLid" disabled>Lid informatie</button>
                    <!-- /.Button opening the modal for showing Member information. -->

                    <!-- Button opening the modal for emailing Members. -->
                    <button id="EmailModal" name="EmailModal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalEmail" disabled>Email Lid</button>
                    <!-- /.Button opening the modal for emailing Members. -->
                </div>
                <div class="col-sm-1">
                    <!-- Button opening the modal for deleting Members. -->
                    <button id="VerwijderLidModal" name="VerwijderLidModal" type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#DeleteMemberModal" disabled>Verwijder Lid</button>
                    <!-- /.Button opening the modal for deleting Members. -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/registreer.js"></script>
<script src="js/selectieScript.js"></script>
<script src="js/showlid.js"></script>
</body>
</html>
