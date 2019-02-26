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
                    <h1>Filter</h1>
                    <br>
                    <h3><b>Filter List</b></h3>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addFilter">Add Filter</button>
                    </div>
                </div>
            </div>

            <table id="filterList" class="table table-striped table-bordered bulk_action" style = "width : 100%">
                <thead>
                <tr>
                    <th>Filter ID</th>
                    <th>Station Code</th>
                    <th>Postal Code</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Filter ID</th>
                    <th>Station Code</th>
                    <th>Postal Code</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                <?php

                $path = "http://localhost/fedex/includes/server/index.php?";
                $action = "action=showAllFilter";
                $apiPath = $path . $action;
                $response = file_get_contents($apiPath);
                $response = json_decode($response, true);
                foreach ($response['results'] as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['flight_filter_id'] . "</td>";
                    echo "<td>" . $row['station_code'] . "</td>";
                    echo "<td>" . $row['flight_postal_code'] . "</td>";
                    echo "<td><button class='editButton btn btn-primary' data-toggle='modal' data-target='#editFilter' value='" . $row['flight_filter_id'] . "' id='" . $row['flight_filter_id'] . "'>Edit</button></td>";
                    echo "</tr>";
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
<div class="modal fade" id="addFilter" role="form">
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
                <form class="form-horizontal" id="addFilterForm">
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="station">Station</label>
                            <div class="col-md-9">
                                <input id="station" name="station" type="text" placeholder="#######"
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="filter_postal_code">Postal Code</label>
                            <div class="col-md-9">
                                <select id="filter_postal_code" name="filter_postal_code" class="form-control" style="width: 100%;">
                                    <?php
                                    $apiPath = $path . "action=option_postal_code";
                                    echo file_get_contents($apiPath);
                                    ?>
                                </select>
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

<!-- Add Drum Modal -->
<div class="modal fade" id="editFilter" role="form">
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Filter</h4>
            </div>
            <!-- Modal Header-->

            <!-- Modal Body-->
            <div class="modal-body">
                <form class="form-horizontal" id="editFilterForm">
                    <fieldset>
                        <!-- Text input -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_filter_id">Filter ID</label>
                            <div class="col-md-9">
                                <input id="edit_filter_id" name="edit_filter_id" type="text" disabled="true"
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_station">Station</label>
                            <div class="col-md-9">
                                <input id="edit_station" name="edit_station" type="text" placeholder="#######"
                                       class="form-control input-md" required="true">
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit_filter_postal_code">Postal Code</label>
                            <div class="col-md-9">
                                <select id="edit_filter_postal_code" name="edit_filter_postal_code" class="form-control" style="width: 100%;">
                                    <?php
                                    $apiPath = $path . "action=option_postal_code";
                                    echo file_get_contents($apiPath);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submit"></label>
                            <div class="col-md-4">
                                <button id="edit_submit" name="submit" class="btn btn-primary">Submit</button>
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
        $('#filterList').DataTable({
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
    $(document).ready(function () {
        $('.editButton').click(function () {
            $.ajax({

                url: "http://localhost/fedex/includes/server/index.php",

                data: {
                    'action': "showOneFilterById",
                    'id': $(this).val()
                },

                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                },

                success: function (data) {
                    console.log(data['results'][0]['flight_filter_id']);
                    $('#edit_filter_id').val(data['results'][0]['flight_filter_id']);
                    $('#edit_station').val(data['results'][0]['station_code']);
                    $('#edit_filter_postal_code').val(data['results'][0]['flight_postal_code']).trigger('change.select2');
                },

                type: 'POST'
            })
        });
        $('#add_submit').click(function () {
            $.ajax({

                url: "http://localhost/fedex/includes/server/index.php",

                data: {
                    'action': "addFilter",
                    'flight_postal_code': $('#filter_postal_code').val(),
                    'station_code': $('#station').val()
                },

                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                },

                success: function (data) {
                    console.log(data);
                },

                type: 'POST'
            })
        });
        $('#edit_submit').click(function () {
            $.ajax({

                url: "http://localhost/fedex/includes/server/index.php",

                data: {
                    'action': "updateFilter",
                    'flight_postal_code': $('#edit_filter_postal_code').val(),
                    'station_code': $('#station').val(),
                    'id': $('#edit_filter_id').val()
                },

                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                },

                success: function (data) {
                    console.log(data);
                },

                type: 'POST'
            })
        });
    });
    $(document).ready(function () {

        $("#filter_postal_code").select2({
            templateResult: formatState
        });

    });

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            '<span>' + state.text + '</span>'
        );

        return $state;
    };
</script>

<?php render('footer'); ?>
