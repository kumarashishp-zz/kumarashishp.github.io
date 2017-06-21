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
      	
		<link href="style.css" rel="stylesheet">
    </head>
  	
  	<body>
		<div class="container-fluid">
            <div class="well bg-color">
                <h2 class="text-center">Ashish Test Page</a></h2>
            </div>
        </div>

		<div class="container-fluid">
            <div class="row">
  				<div class="col-xs-12">
                	<div style="text-align:center;">         
	                	<br/>
						<br/>
			   
						<div style="max-width: 600px; margin: 0 auto; text-align: left;" class="alert alert-danger">
							<h3>An error occurred</h3>
							<?php echo $result->message ?>
						</div>
		
		                <br/>
						<br/>

					</div>
  				</div>
  				
  				<div class="col-xs-12">
                	<div style="text-align:center;">
                   		<h3>Click <a href='index.php'>here</a> to go to Homepage</h3>
                	</div>
                </div>  				
  			</div>
		</div>
		<br />
	</body>
</html>
