<?php
include 'bddconnection.php';
$datebooking=$_GET['datebooking'];
$test = $conn->query("SELECT `evenement`, `date`, `lieu`, `importance` FROM `evenement` WHERE `date` = '".$datebooking."'");
$donnees = $test->fetch_all();
print_r(json_encode($donnees));