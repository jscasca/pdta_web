<!doctype HTML>
<html>
<head>
	<title>Registrate y unete a Posdta!</title>
	
	<meta charset="UTF-8" />
	<meta description="Description" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta property="og:title" content="Posdta" />
	
	<link rel="shortcut icon" href="img/favicon.png"> 
	
	<!-- bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/submit.css" rel="stylesheet" >
	<link href="css/register.css" rel="stylesheet" >
</head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script src="https://code.jquery.com/jquery.js"></script>-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Include all compiled plugins -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Backbone js for mvc -->
	<script type="text/javascript" src="js/underscore.1.8.3.js"></script>
	<script type="text/javascript" src="js/backbone.min.1.2.1.js"></script>
	
	
	<script type="text/javascript">
	
	</script>
	
	<!--<div class="jumbotron">-->
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 formContainer">
				<div class="formHeader">
					<img src="img/logo_white.png" class="img-responsive center-block formTitle"/>
				</div>
				<div class="formBody" id="registration">
					<form role="form" action="php/submit/registration.php" method="POST" class="containedForm">
						<div class="form-group has-feedback">
							<label for="email">E-Mail:</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" required />
							<input type="hidden" id="emailValidation" value="0" />
						</div>
						<div class="form-group has-feedback">
							<label for="user">Usuario:</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="Username" required pattern="[a-zA-Z0-9_]+" />
							<input type="hidden" id="usernameValidation" value="0" />
						</div>
						<div class="form-group has-feedback">
							<label for="pwd">Contrase&ntilde;a</label>
							<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required />
						</div>
						<div class="form-group has-feedback">
							<label for="pwd">Confirmar contrase&ntilde;a</label>
							<input type="password" class="form-control" id="pwdConfirmation" name="pwdConfirmation" placeholder="Password" required />
							<input type="hidden" id="pwdValidation" value="0" />
						</div>
						<div class="formLink">
							<a href="login.php">Iniciar sesi&oacute;n</a>
						</div>
						<div class="formLink">
							<a href="forgotten.php">Olvidaste tu contrase&ntilde;a?</a>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-lg btn-primary center-block">Reg&iacute;strate!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

