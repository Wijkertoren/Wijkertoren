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
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/database.css" rel="stylesheet" type="text/css">
        <link href="css/data-tables-min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

        <?php
        $con = mysqli_connect("localhost", "root", "", "wijkertoren");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
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
                                            while ($row = mysqli_fetch_array($resultDonatie)) {
                                                echo "<td>" . $row["Datum_donatie"] . "</td>"
                                                . "<td>" . $row["Donatie_kenmerk"] . "</td>";
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
                                            while ($row = mysqli_fetch_array($resultDonatie)) {
                                                echo "<td>" . $row["Datum_donatie"] . "</td>"
                                                . "<td>" . $row["Donatie_kenmerk"] . "</td>";
                                            }
                                        } else {
                                            echo "<td> </td>"
                                            . "<td> </td>";
                                        }
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "There was a problem with the Database or Query";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    //
    $(document).ready(function () {
        var table = $('#example').DataTable();
        //horizontal scrolling
        $('#example').DataTable({"scrollX": true});
        //click row function
        $('#example tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });
        $('#button').click(function () {
            alert(table.rows('.selected').data().length + ' row(s) selected');
        });
    });
</script>
</html>
