<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	
      	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>      	
      	
      	<title>Ashish's Test Page</title>
      
      	<!--Including Bootstrap style files-->
      	<link href="css/bootstrap.min.css" rel="stylesheet">
      	
		<link href="css/style.css" rel="stylesheet">
    </head>
  	
  	<body>
		<div class="container-fluid">
            <div class="well bg-color">
                <h2 class="text-center">Ashish's Test Page</a></h2>
            </div>
        </div>

		<?php require_once("configuration.php"); ?>
	
	<!-- Reference the required client SDKs -->
	<script src="<?php echo BT_JAVASCRIPT_CLIENT ?>"></script>
	<script src="<?php echo BT_JAVASCRIPT_PAYPAL ?>"></script>
	<script src="<?php echo PP_CHECKOUT ?>"></script>

    <div style="align:center">
		<h3 class="text-center"> Shopping Cart </h2>
        <br />                   
							
		<table class="table table-striped">
			<tr>
				<th>Quantity</th>
				<th></th>
				<th>Description</th>
				<th>Price</th>
			</tr>
			<tr>
				<td>1</td>
				<td><img src="img/iPhone.jpg" width="60" height="45" /></td>									
				<td>iPhone 7 Red</td>
				<td>300.00</td>
			</tr>
													
			<!--  Show Shipping option only after PayPal mini-browser session is complete -->
			<tr class="select-shipping" style="display: none;">
				<th colspan="3" style="text-align: right;"> Total </th>									
				<td>
					<span id="total-amount-display"></span>
				</td>
			</tr>							
		</table>
		
		<br />
		
		<!-- Pay Now button  -->
	 	<div id="pay-now" style="display: none; text-align: center;">
			<form action="server.php" method="post">
				<input type="hidden" name="checkout" value="classic" />
				<input type="hidden" name="payment-method-nonce" class="payment-method-nonce" />
				<input type="hidden" name="item-quantity" value="1" />
				<input type="hidden" name="item-description" value="iPhone 7 Red" />
				<input type="hidden" name="currency" value="USD" />
						
				<input type="hidden" id="first-name" name="first-name" value="" />
				<input type="hidden" id="last-name" name="last-name" value="" />
				<input type="hidden" id="recipient" name="recipient" value="" />
				<input type="hidden" id="line1" name="line1" value="" />
				<input type="hidden" id="line2" name="line2" value="" />
				<input type="hidden" id="city" name="city" value="" />
				<input type="hidden" id="state" name="state" value="" />
				<input type="hidden" id="postal-code" name="postal-code" value="" />
				<input type="hidden" id="country-code" name="country-code" value="" />
				
				<input type="hidden" id="item-amount" name="item-amount" value="300.00" />
				<input type="hidden" id="total-amount" name="total-amount" value="" />										
					
				<button type="submit"  style="width: 226px;" id="pay-now" type="button" class="btn btn-primary" onClick="helper();" >Pay Now</button>
			</form>
		</div>	
								
		<!-- loader icon while server is processing transaction  -->
		<div style="width: 100%; text-align: center;">
			<div class="loader" style="display: none;"></div>
		</div>
						
		<!-- Proceed to Checkout button -->
		<div style="text-align: center;" id="second-flow">
			<br/>
			<br/>
			<form action="checkout.php" method="post"> 
				<input type="hidden" name="item-name" value="iPhone 7 Red" />
				<input type="hidden" name="item-id" value="A9834" />
				<input type="hidden" name="item-description" value="128GB" />
				<input type="hidden" name="item-quantity" value="1" />
				<input type="hidden" name="item-price" value="300.00" />
				<input type="submit" value="Proceed to Checkout" class="btn btn-primary btn-large" id="continue" />
			</form>
		</div>

		<div>
			<h4> Here is the PayPal sandbox account for buyer:</h4>
			<table class="table table-striped" style="width: 260px;text-align:center">
				<tr>
					<th>Email</th>
					<th>Password</th>
				</tr>
				<tr>
					<td>jack_potter@buyer.com</td>
					<td>123456789</td>
				</tr>			
		</div>
	<br />
	</body>
</html>