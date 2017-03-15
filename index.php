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
        <link href="css/bootstrap.min.css" rel="stylesheet">
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
                        <table id="example" class="display" cellspacing="0">
                            <thead>
                                <tr>
                                    <!--Headers of the table-->
                                    <th><input type="checkbox" name="checked" value="OFF" /> Checked All</th>
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
                                </tr>
                            </thead>
                            <?php
//                                    $query = "SELECT * from ledenregister";
//                                    if ($result = mysqli_query($con, $query)) {
//                                        /* Get field information for all fields */
//                                        while ($finfo = mysqli_fetch_field($result)) {
//                                            if ($finfo->name == "Persoon_nr") {
//                                                $query2 = "SELECT * from personen";
//                                                if ($result2 = mysqli_query($con, $query2)) {
//                                                    while ($finfo2 = mysqli_fetch_field($result2)) {
//                                                        if ($finfo2->name == "Persoon_nr") {
//                                                            
//                                                        } else {
//                                                            printf("<th>%s</th>", $finfo2->name);
//                                                        }
//                                                    }
//                                                }
//                                            } elseif ($finfo->name == "Organisatie_nr") {
//                                                $query3 = "SELECT * from organisaties";
//                                                if ($result3 = mysqli_query($con, $query3)) {
//                                                    while ($finfo3 = mysqli_fetch_field($result3)) {
//                                                        if ($finfo3->name == "Organisatie_nr") {
//                                                            
//                                                        } else {
//                                                            printf("<th>%s</th>", $finfo3->name);
//                                                        }
//                                                    }
//                                                }
//                                            } else {
//                                                printf("<th>%s</th>", $finfo->name);
//                                            }
//                                        }
//                                    }
//                                    
                            ?>
                            <tfoot>
                                <tr>
                                    <th><input type="checkbox" name="checked" value="OFF" /> Checked All</th>
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
                                </tr>
                            </tfoot>
                            <!-- All the different data in 1 row-->
                            <?php
                            /*
                             *  This could be done way simpler since this table is pretty much static...
                             *  It is the old footer
                             */
//                                    $query = "SELECT * from ledenregister";
//                                    if ($result4 = mysqli_query($con, $query)) {
//                                        /* Get field information for all fields */
//                                        while ($finfo4 = mysqli_fetch_field($result4)) {
//                                            if ($finfo4->name == "Persoon_nr") {
//                                                $query5 = "SELECT * from personen";
//                                                if ($result5 = mysqli_query($con, $query5)) {
//                                                    while ($finfo5 = mysqli_fetch_field($result5)) {
//                                                        if ($finfo5->name == "Persoon_nr") {
//                                                            
//                                                        } else {
//                                                            printf("<th>%s</th>", $finfo5->name);
//                                                        }
//                                                    }
//                                                }
//                                            } elseif ($finfo4->name == "Organisatie_nr") {
//                                                $query6 = "SELECT * from organisaties";
//                                                if ($result6 = mysqli_query($con, $query6)) {
//                                                    while ($finfo6 = mysqli_fetch_field($result6)) {
//                                                        if ($finfo6->name == "Organisatie_nr") {
//                                                            
//                                                        } else {
//                                                            printf("<th>%s</th>", $finfo6->name);
//                                                        }
//                                                    }
//                                                }
//                                            } else {
//                                                printf("<th>%s</th>", $finfo4->name);
//                                            }
//                                        }
//                                    }
                            ?>
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
                                    $checknr = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr><td><input type="checkbox" name="Check' . $checknr . '" value="OFF" /></td>';
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
                                        . "<td>" . $row["Extra_info"] . "</td>"
                                        . "</tr>";
                                        $checknr++;
                                    }
                                     
                                } else {
                                    
                                }
                                if ($result = mysqli_query($con, $queryorganisatie)) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr><td><input type="checkbox" name="Check' . $checknr . '" value="OFF" /></td>';
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
                                        . "<td>" . $row["Extra_info"] . "</td>"
                                        . "</tr>";
                                        $checknr++;
                                    }
                                } else {
                                    echo "shit";
                                }
                                ?>

                                <?php
                                /*
                                 *  This is old code that might be needed, but it is currently horribly broken.
                                 *  It will remain to show what I've been wrecking my brain on. It is a terrible block of code...
                                 */

//                                //put all the data in from what ever is in the header.
////                                $query = "SELECT * from ledenregister";
////                                if ($result = mysqli_query($con, $query)) {
////                                    /* Get field information for all fields */
////                                    while ($result->fetch_assoc()) {
////                                        if ($finfo->name == "Persoon_nr") {
////                                            
////                                        }
////                                    }
////                                }
//                                $query = "SELECT * from ledenregister";
//
//                                $result = mysqli_query($con, $query)or die(mysqli_error());
//
//                                $post = array();
//                                while ($row = mysqli_fetch_assoc($result)) {
//                                    $post[] = $row;
//                                }
//                                $checknr = 0;
//                                foreach ($post as $row) {
//                                    echo "<tr>";
//                                    echo'<td><input type="checkbox" name="Check' . $checknr . '" value="OFF" /></td>';
//                                    foreach ($row as $element) {
//                                        if($row["Persoon_nr"]==$row){       
//                                            $query7 = "SELECT voornaam, achternaam, tussenvoegsel, geslacht FROM personen WHERE " . $element . " = Persoon_nr";
//                                            if ($result7 = mysqli_query($con, $query7)) {
//                                                $post7 = array();
//                                                while ($row7 = mysqli_fetch_assoc($result7)) {
//                                                    $post7[] = $row7;
//                                                }
//                                                foreach ($post7 as $row7) {
//                                                    foreach ($row7 as $element7) {
//                                                        echo "<td>" . $element7 . "</td>";
//                                                    }
//                                                }
//                                            } else {
//                                                echo"<td>vn</td><td>ac</td><td>ts</td><td>gs</td>"; 
//                                            }
//                                        } elseif ($element === $row["Organisatie_nr"]) {
//                                            if ($element === NULL) {
//                                                echo "<td>LEEGORGANISATIE</td>";
//                                            } else {
//                                                $query8 = "SELECT Organisatie_naam, Contact_persoon FROM organisaties WHERE " . $element . " = Organisatie_nr";
//                                                $result8 = mysqli_query($con, $query8)or die(mysqli_error());
//                                                $post8 = array();
//                                                while ($row8 = mysqli_fetch_assoc($result8)) {
//                                                    $post8[] = $row8;
//                                                }
//                                                foreach ($post8 as $row8) {
//                                                    foreach ($row8 as $element8) {
//                                                        echo "<td>" . $element8 . "</td>";
//                                                    }
//                                                }
//                                            }
//                                        } else {
//                                            echo "<td>" . $element . "</td>";
//                                        }
//                                    }
//                                    echo " </tr>";
//                                    $checknr++;
//                                }
//
//                                mysqli_free_result($result);
//                                mysqli_free_result($result2);
//                                mysqli_free_result($result3);
//                                mysqli_free_result($result4);
//                                mysqli_free_result($result5);
//                                mysqli_free_result($result6);
//                                mysqli_free_result($result7);
//                                mysqli_free_result($result8);
//                                
                                ?>
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function () {
                                $('#example').DataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
