<?php

require_once('configuration.php');
require_once(BRAINTREE_PHP_SDK);

$gateway = new Braintree_Gateway(array(
	'accessToken' => ACCESS_TOKEN,
));
	
echo($clientToken = $gateway->clientToken()->generate());
	
?>