<?php
$sql = "SELECT * FROM `fees_details` WHERE applicant_id='18' ";
$sql1 = "SELECT * FROM `user`  WHERE id='18' ";
require "db.php";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<style type="text/css">

		
		
		table
		{
			width: 100%;
			height: 100%;
			border-collapse: collapse;
			border: 2px solid black	;
			border: 2px solid mediumseagreen;
		}
		th
		{
			font-size: 35px;
		}
		td
		{
			font-size: 30px
		}

	.center 
	{
		background-color: none;
  		margin: 0;
 	 	position: absolute;
 	 	top: 50%;
  		left: 50%;
  		-ms-transform: translate(-50%, -50%);
  		transform: translate(-50%, -50%);
	}
	
	.btn
	{

		color:white;
		 background-color:green;
		 font-weight: bold;
  		border-radius:25px; 	
  		margin-top: 50px;
  		border:none;" 
  		font-size: 25px;
  		padding:20px; 
  	}	
	
  




	</style>
</head>
<body>
	<div id="print">
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
		<th>Total amount to be paid</th>
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
	</div><br><br>
	
  <div class="center">
  	<button onclick="printpage()" class="btn">

	<center>&nbsp;&nbsp;Download&nbsp;&nbsp;</center></button>
	
	
</div>
	
	</button>
	<script>
		function printpage()
		{
			var area = document.getElementById("print");
			var printpage = window.open();
			printpage.document.write(area.innerHTML);
			printpage.document.close();
			printpage.focus();
			printpage.print();
			printpage.close();
		}
	</script>


	
</body>
</html>
