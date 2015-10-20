<?php
$token = isset($_REQUEST['token'])?$_REQUEST['token']:'';
?>
<!doctype HTML>
<html>
<head>
	<title>Restablece tu contrase&ntilde;a</title>
	
	<meta charset="UTF-8" />
	<meta description="Description" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta property="og:title" content="Posdta" />
	
	<link rel="shortcut icon" href="img/favicon.png"> 
	
	<!-- bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/submit.css" rel="stylesheet" >
	<link href="css/forgotten.css" rel="stylesheet" >
</head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins -->
	<script src="js/bootstrap.min.js"></script>
	
	<!--<div class="jumbotron">-->
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 formContainer">
				<div class="formHeader">
					<img src="img/logo_white.png" class="img-responsive center-block formTitle"/>
				</div>
				<div class="formBody">
					<form role="form" action="php/submit/passwordReset.php" class="containedForm" method="POST">
						<input type="hidden" name="anchor" value="<?php echo $token;?>" />
						<div class="formInstructions">
							<label for="instructions">Estable una nueva contrase&ntilde;a</label>
							<p id="instructions">Crea una nueva contrase&ntilde;a y trata de no olvidarla!</p>
						</div>
						<div class="form-group has-feedback">
							<label for="user">Usuario:</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="Username" required pattern="[a-zA-Z0-9_]+" />
						</div>
						<div class="form-group">
							<label for="user">Contrase&ntilde;a:</label>
							<input type="password" class="form-control" id="pwd" name="pwd" placeholder="New Password" />
						</div>
						<div class="form-group">
							<label for="user">Confirma tu contrase&ntilde;a:</label>
							<input type="password" class="form-control" id="pwdConfirmation" placeholder="Confirm Password" />
						</div>
						<div class="formLink">
							<a href="login.php">Iniciar sesi&oacute;n</a>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-lg btn-primary center-block">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

