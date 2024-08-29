<?php
session_start();
$id=$_SESSION['id'];
$sql = "SELECT * FROM `fees_details` WHERE applicant_id='$id' ";
$sql1 = "SELECT * FROM `user`  WHERE id='$id' ";
require "db.php";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row1["name"]; ?>'s Payment <?php echo $row["status"]; ?></title>
	<style>
		#print
		{
			position: relative;
		}
		table
		{
			position: absolute;
			width: auto;
			height: 400px;
			border-collapse: collapse;
			border: 1px solid black;
			top: 50%;
			left: 50%;
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, 30%);
			text-align: center;
		}
		tr,th,td
		{
			padding: 5px;
		}
	</style>
</head>
<body>
	<div id="print" >
		<table border="1">
			<caption>PAYMENT RECEIPT</caption>
			<tr>
				<th>Name</th>
				<td><?php echo $row1["name"]; ?></td>
			</tr>
			<tr>
				<th>Payment id</th>
				<td><?php echo $row["payment_id"]; ?></td>
			</tr>
			<tr>
				<th>Order id</th>
				<td><?php echo $row["order_id"]; ?></td>
			</tr>
			<tr>
				<th>Total amount paid</th>
				<td><?php echo $row["amount"]; ?></td>
			</tr>
			<tr>
				<th>Payment status</th>
				<td><?php echo $row["status"]; ?></td>
			</tr>
			<tr>
				<th>Date of payment</th>
				<td><?php echo $row["date_of_ payment"]; ?></td>
			</tr>
		</table>
	</div>
	<script>
		window.onload=function(){
			window.print();
			var timeleft = 1;
    var downloadTimer = setInterval(function(){
      if(timeleft <= 0){
        clearInterval(downloadTimer);
        window.location.replace("http://localhost/minorProject/");
    }
    timeleft -= 1;
}, 1000)
    ;
			
};
	</script>
</body>
</html>
