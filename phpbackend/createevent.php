<?php
include 'bddconnection.php';
$date=$_POST['datebooking'];
$place=$_POST['place'];
$criticity=$_POST['criticity'];
$insert=$conn->query("INSERT INTO `evenement`(`evenement`, `date`, `lieu`, `importance`) VALUES ('test20','2019/10/22 09:00:00',".$place.",".$criticity.")");
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert . "<br>" . $conn->error;
}
$conn->close();
