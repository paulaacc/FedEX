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
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addFile">Add File</button>
                    </div>
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

<!-- Add Drum Modal -->
<div class="modal fade" id="addFile" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Filter</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="addFilterForm" action="../includes/server/index.php" method="POST">
                    <fieldset>

                        <input type="hidden" name="action" value="uploadCSV">

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="file">File</label>
                            <div class="col-md-9">
                                <input id="file" name="file" type="file"
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submit"></label>
                            <div class="col-md-4">
                                <button id="add_submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


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
