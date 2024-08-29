<?php

$settingQuery=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='1'");
$setting=mysqli_fetch_assoc($settingQuery);

$AdmitCardQuery=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='2'");
$AdmitCard=mysqli_fetch_assoc($AdmitCardQuery);

$ResultQuery=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='3'");
$Result=mysqli_fetch_assoc($ResultQuery);
?>