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
		<?php 
			require_once("configuration.php");
			$item_price	= (isset($_POST["item-price"]))	? $_POST["item-price"] : "";
		?>
	
		<!-- Reference the required client SDKs -->
		<script src="<?php echo BT_JAVASCRIPT_CLIENT ?>"></script>
		<script src="<?php echo BT_JAVASCRIPT_PAYPAL ?>"></script>
		<script src="<?php echo PP_CHECKOUT ?>"></script>

		<div style="align:center;">
			<h2 class="text-center">Checkout</h2>
			<div style="text-align: center;"> <h4>Ship to</h4> </div>
						
						<form class="form-horizontal" id="bt-payPalButton-form" action="server.php" method="post">
						
							<input type="hidden" name="checkout" value="pay-now" />
							<input type="hidden" name="payment-method-nonce" class="payment-method-nonce" />
							<input type="hidden" name="item-description" value="iPhone 7 Red" />
							<input type="hidden" name="currency" value="USD" />	
							<input type="hidden" id="item-price-original" name="item-price-original" value="<?php echo $item_price ?>" />							
							<input type="hidden" id="total-amount" name="total-amount" value="<?php echo $item_price ?>" />
							<input type="hidden" id="recipient" name="recipient" value="" />  
							
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">First Name</label>
						    	<div class="col-sm-9">
						      		<input class="form-control" type="text" id="first-name" name="first-name" value="Mark">
						    	</div>
						  	</div>
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">Last Name</label>
						    	<div class="col-sm-9">
						      		<input class="form-control" type="text" id="last-name" name="last-name" value="Rubin">
						    	</div>
						  	</div>						
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">Address 1</label>
						    	<div class="col-sm-9">
						      		<input class="form-control" type="text" id="line1" name="line1" value="55 East 52nd Street">
						    	</div>
						  	</div>
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">Address 2</label>
						    	<div class="col-sm-9">
						      		<input class="form-control" type="text" id="line2" name="line2" value="21st Floor">
						    	</div>
						  	</div>							
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">City</label>
						    	<div class="col-sm-9">
						      		<input class="form-control" type="text" id="city" name="city" value="New York">
						    	</div>
						  	</div>	
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">State</label>
						    	<div class="col-sm-9">
						      		<input class="form-control" type="text" id="state" name="state" value="NY">
						    	</div>
						  	</div>	
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">Postal Code</label>
						    	<div class="col-sm-9">
						      		<input class="form-control" type="text" id="postal-code" name="postal-code" value="10022">
						    	</div>
						  	</div>						  	
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">Country</label>
						    	<div class="col-sm-9">
						      		<select class="form-control input-sm" id="country-code" name="country-code">
										<option value="CA">Canada</option>
										<option value="MX">Mexico</option>
										<option selected value="US">United States</option>
									</select>
						    	</div>
						  	</div>
							<div class="form-group form-group-sm" style="margin-bottom: 4px;">
						    	<label class="col-sm-3 control-label">Shipping Charge</label>
						    	<div class="col-sm-9">
						      		<select class="form-control input-sm" id="shipping-method" name="shipping-method" onChange="updateTotalAmount(this)">
										<option selected="selected" value="5.00"> $5.00</option>
											</optgroup> 	
									</select>
						    	</div>
						  	</div>
						
						</form>			

						<hr />

						<div>
							<h4 style="text-align: center;">Payment methods</h4>
							
							<div style="text-align: center;">
						
								<span style="font-size: 12pt;">Total amount: $</span>
								<span id="total-amount-display" style="font-size: 12pt;"></span>
								<span style="font-size: 12pt;">USD</span>
								<br />
								<br />
							</div>

							<div id="payment-methods" style="width: 280px; margin: 0 auto;">
								
								<!-- PayPal Checkout button -->
								<div class="papbutton-div">							 																					
									<div id="papbutton" style="padding-left: 10px;"></div>
								</div>
							</div>
						</div>
			</div>
		</div>
			
		<script>
			// authorization from server
			var authorization = '<?php require_once('bt-get-client-token.php') ?>' ;
			
			// Checkout with PayPal
			var ppForm = document.getElementById('bt-payPalButton-form');
			var btPayPalButton = document.getElementById('papbutton');

			
			braintree.client.create({
				authorization: authorization
			}, function(clientErr, clientInstance) {
				// Handle error in client creation
				if (clientErr) { 
					console.log('Error creating client instance: ' + clientErr);
					return;
				}

				/* Braintree - PayPal button component */
				braintree.paypalCheckout.create({
					client: clientInstance
				}, function (createErr, paypalCheckoutInstance) {
					if (createErr) {
						if (createErr.code === 'PAYPAL_BROWSER_NOT_SUPPORTED') {
							console.error('This browser is not supported.');
						} 
						else {
							console.error('Error!', createErr);
						}
						return;
					}
					
					paypal.Button.render({
						// sandbox or production
						env: '<?php echo ENVIRONMENT ?>', 
						locale: 'en_US',
						payment: function () {
							return paypalCheckoutInstance.createPayment({
								flow: 'checkout',
								intent: 'sale',
								amount: getAmount(),
								currency: 'USD',
								locale: 'en_US',
								displayName: 'Ashish Test Store',
								enableShippingAddress: true,
								shippingAddressEditable: false,
								shippingAddressOverride: {
									recipientName: getRecipientName(),
									line1: getLine1(),
									line2: getLine2(),
									city: getCity(),
									countryCode: getCountryCode(),
									postalCode: getPostalCode(),
									state: getState()
								}
							});
						},
											
						commit: true, // Show a 'Pay Now' button in the checkout flow

						onAuthorize: function (data, actions) {
							return paypalCheckoutInstance.tokenizePayment(data, function (err1, payload) {
								
								// Pay Now clicked in PayPal mini-browser
								
								if (err1) {
									console.error('onAuthorize: ', err1);
								}
								else {
									console.log('Paypal nonce: ', payload.nonce );
									
									// show spinner
									$('.loader').css('display', 'inline-block');
									
									// Put `payload.nonce` into the 'payment-method-nonce' input, then submit the form 
									$('.payment-method-nonce').val(payload.nonce);
									ppForm.submit();
								}
							});
						},

						onCancel: function (data) {
							console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
							var currentUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
							var cancelUrl = currentUrl.substring(0, currentUrl.lastIndexOf('/')) + '/cancel.php';
							window.location.href = cancelUrl;

						},

						onError: function (err) {
							console.error('checkout.js error', err.toString());
							var currentUrl = window.location.href = window.location.protocol + '//' + window.location.host + window.location.pathname;
							var errorUrl = currentUrl.substring(0, currentUrl.lastIndexOf('/')) + '/error.php?message='+err.toString();
							window.location.href = errorUrl;
						}
					}, '#papbutton'); // the PayPal button will be rendered in an html element with the id `papbutton`
				});				

			});

		</script>
		
		<script>
			updateTotalAmount(document.getElementById("shipping-method"));
		
			// adjust total amount based on shipping
			function updateTotalAmount(that) {
				
				var totalAmount = (Number(document.getElementById("item-price-original").value) + Number(that.value)).toFixed(2);
				
				document.getElementById("total-amount").value = totalAmount;
				document.getElementById("total-amount-display").innerHTML = totalAmount;
			}
			
			
			// update "paypalCheckoutInstance.createPayment" with current "Ship to" data prior to payment		
			function getRecipientName() {
				document.getElementById("recipient").value =  document.getElementById("first-name").value + ' ' + document.getElementById("last-name").value;
				return (document.getElementById("first-name").value + ' ' + document.getElementById("last-name").value);
			}
			function getLine1() {
				return (document.getElementById("line1").value);
			}			
			function getLine2() {
				return (document.getElementById("line2").value);
			}
			function getCity() {
				return (document.getElementById("city").value);
			}
			function getState() {
				return (document.getElementById("state").value);
			}
			function getPostalCode() {
				return (document.getElementById("postal-code").value);
			}
			function getCountryCode() {
				return (document.getElementById("country-code").value);
			}			
			function getAmount() {
				return (document.getElementById("total-amount").value);
			}			
			
		</script>		
		<br />
	</body>
</html>
