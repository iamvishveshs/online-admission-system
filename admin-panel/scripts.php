<?php
/*Getting total amount of fees */
$feesQuery = "SELECT SUM(amount) FROM `fees_details`";
$feesResult =mysqli_query($conn,$feesQuery);
$fees=mysqli_fetch_array($feesResult);


/*Getting the count of all registered users*/
$totalApplicantQuery = "SELECT COUNT(*) FROM `user` WHERE `role`!='admin'";
$totalApplicantResult =mysqli_query($conn,$totalApplicantQuery);
$totalApplicant=mysqli_fetch_array($totalApplicantResult);


/*Getting the count of all the applications that are submitted successfully*/ 
$successfulApplicationQuery = "SELECT COUNT(*) FROM `application_status` WHERE `status`='success'	";
$successfulApplicationResult =mysqli_query($conn,$successfulApplicationQuery);
$successfulApplication=mysqli_fetch_array($successfulApplicationResult);

/*Getting the count of all the applications that are partially submitted*/ 
$partialApplicationQuery = "SELECT COUNT(*) FROM `application_status` WHERE `status`='partial'	";
$partialApplicationResult =mysqli_query($conn,$partialApplicationQuery);
$partialApplication=mysqli_fetch_array($partialApplicationResult);

/*Getting the count of all the applications that are almost submitted*/ 
$almostApplicationQuery = "SELECT COUNT(*) FROM `application_status` WHERE `status`='almost'	";
$almostApplicationResult =mysqli_query($conn,$almostApplicationQuery);
$almostApplication=mysqli_fetch_array($almostApplicationResult);


/*Getting the count of all the applications that are not submitted successfully*/ 
$applicationQuery = "SELECT COUNT(*) FROM `application_status` WHERE `status`!='success'	";
$applicationResult =mysqli_query($conn,$applicationQuery);
$application=mysqli_fetch_array($applicationResult);


/*Getting Only Registered candidates */
$onlyRegistered=$totalApplicant['COUNT(*)']-($successfulApplication['COUNT(*)']+$partialApplication['COUNT(*)']+$almostApplication['COUNT(*)']);


$settingQuery=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='1'");
$setting=mysqli_fetch_assoc($settingQuery);
?>