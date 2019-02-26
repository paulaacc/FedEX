<?php
//session_start();
//var_dump($_SESSION);
include '../includes/config.php';
require_once('../includes/helpers.php');
//check_session();
render('header');
?>

<!--<body class="nav-md">-->

<?php render('navigation'); ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!--<div class="x_panel">-->
            <div class="page-title">
                <div class="title_left">
                    <h1>Dashboard</h1>
					<br>
                    <h3><b>Filter List</b></h3>
                </div>
            </div>
			
            <table id="filterTable" class="table table-striped table-bordered bulk_action" style = "width : 100%">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Station</th>
                    <th>Number of packages</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Station</th>
                    <th>Number of packages</th>
                </tr>
                </tfoot>
                <tbody>
					<?php

                    $path = "http://localhost/fedex/includes/server/index.php?";
                    $action = "action=showFilterByPostalCode";
                    $apiPath = $path . $action;
                    $response = file_get_contents($apiPath);
                    $response = json_decode($response, true);
                    $count = 1;
                    foreach ($response['results'] as $row) {
                        echo "<tr>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $row['station_code'] . "</td>";
                        echo "<td>" . $row['count_of_package'] . "</td>";
                        echo "</tr>";
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
            <!--</div>-->
        </div>
    </div>
</div>
<!-- /page content -->


<script>
    $(document).ready(function () {
        $('#filterTable').DataTable({
            scrollX: true,
            fixedColumns: {
                leftColumns: 1
            },
            dom: 'TlBfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    title: 'DRUM LIST'
                },
                'excelHtml5',
                'copyHtml5'
            ],
            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "copy",
                        "sButtonText": "Copy to clipboard",
                        "oSelectorOpts": {
                            page: 'current'
                        }
                    }
                ]
            }
        });  // End of DataTable
    });
</script>

<?php render('footer'); ?>
