<?php
//session_start();
//var_dump($_SESSION);
include '../includes/config.php';
require_once('../includes/helpers.php');
//check_session();
render('header');
?>




<?php render('navigation'); ?>

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
                        <!-- Trigger the modal with a button -->
                        <input type="number" id="firstTextBox">
                        <input type="number" id="secondTextBox">
                        <button id="submit">Submit</button>

                        <p id="displayHere"></p>

                        </div>
                    </div>
                </div>
            </div>

        <script>
            $("#submit").click(function(){
               $("#displayHere").html($("#firstTextBox").val());
            });

        </script>

            <?php render('footer'); ?>
