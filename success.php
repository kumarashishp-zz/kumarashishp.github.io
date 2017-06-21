<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	
      	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>      	
      	
      	<title>Ashish Test Page</title>
      
      	<!--Including Bootstrap style files-->
      	<link href="css/bootstrap.min.css" rel="stylesheet">
      	
		<link href="css/style.css" rel="stylesheet">
    </head>
  	
  	<body>
		<div class="container-fluid">
            <div class="well bg-color">
                <h2 class="text-center">Ashish Test Page</a></h2>
            </div>
        </div>

		<?php 
			//require_once("incl.header.php"); 
			$checkout = (isset($_POST["checkout"])) ? $_POST["checkout"] : "";
			$first_name = (isset($_POST["first-name"])) ? $_POST["first-name"] : "";
			$last_name = (isset($_POST["last-name"])) ? $_POST["last-name"] : "";
			$recipient = (isset($_POST["recipient"])) ? $_POST["recipient"] : "";
			$line1 = (isset($_POST["line1"])) ? $_POST["line1"] : "";
			$line2 = (isset($_POST["line2"])) ? $_POST["line2"] : "";
			$city = (isset($_POST["city"])) ? $_POST["city"] : "";
			$state = (isset($_POST["state"])) ? $_POST["state"] : "";
			$postal_code = (isset($_POST["postal-code"])) ? $_POST["postal-code"] : "";
			$country_code = (isset($_POST["country-code"])) ? $_POST["country-code"] : "";	
		?>

		<div style="align:center;">
			<h3> Order Complete </h3>
			<br />
	 					
			<h4>Order details:</h4>
			<strong>Item:</strong> <?php echo $item_description ?> <br />
			<strong>Transaction ID:</strong> <?php echo $transactionid ?>  <br />
			<strong>Status:</strong> <?php echo $status ?>  <br />
			<strong>Total Amount:</strong> <?php echo $total_amount ?>    <?php echo $currency ?> <br />
	 	 	 	 	 	
			<br />
			<br />
					
			<h4>Ship to:</h4>
			<address>
				<strong><?php echo $recipient ?> </strong><br />
				<?php echo $line1 ?> <br />
				<?php echo ($line2 == "") ? "" : $line2 . "<br />" ?> 
				<?php echo $city ?>, <?php echo $state ?>  <?php echo $postal_code ?><br />
				<?php echo $country_code ?>
			</address>
		</div>
	</body>
</html>
