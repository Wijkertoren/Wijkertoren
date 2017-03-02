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
                                    <?php
                                    $array_headers = array();
                                    $query = "SELECT * from ledenregister";
                                    if ($result = mysqli_query($con, $query)) {
                                        /* Get field information for all fields */
                                        $i = 0;
                                        while ($finfo = mysqli_fetch_field($result)) {
                                            printf("<th>%s</th>", $finfo->name);
                                            $array_headers[$i] = $finfo->name;
                                            $i++;
                                        }

                                        mysqli_free_result($result);
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <!-- Repeat for all the roles -->
                            <tfoot>
                                <tr>
                                    <!-- All the different data in 1 row-->
                                    <?php
                                    $query = "SELECT * from ledenregister";
                                    if ($result = mysqli_query($con, $query)) {
                                        /* Get field information for all fields */
                                        while ($finfo = mysqli_fetch_field($result)) {
                                            printf("<th>%s</th>", $finfo->name);
                                        }
                                        mysqli_free_result($result);
                                    }
                                    ?>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                //put all the data in from what ever is in the header.
                                $query = "SELECT * from ledenregister";

                                $result = mysqli_query($con, $query)or die(mysqli_error());

                                $post = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $post[] = $row;
                                }
                                foreach ($post as $row) {
                                    echo "<tr> ";
                                    foreach ($row as $element) {
                                        echo "<td> " . $element . " </td>";
                                    }
                                    echo " </tr>";
                                }
                                mysqli_free_result($result);
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
