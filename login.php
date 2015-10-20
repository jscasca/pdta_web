<!doctype HTML>
<html>
<head>
	<title>Inicia sesi&oacute;n con Posdta</title>
	
	<meta charset="UTF-8" />
	<meta description="Description" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta property="og:title" content="Posdta" />
	
	<link rel="shortcut icon" href="img/favicon.png"> 
	
	<!-- bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/submit.css" rel="stylesheet" >
	<link href="css/login.css" rel="stylesheet" >
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
					<a href="index.php"><img src="img/logo_white.png" class="img-responsive center-block formTitle"/></a>
				</div>
				<div class="formBody">
					<form role="form" action="php/submit/login.php" method="POST"  class="containedForm">
						<div class="form-group">
							<label for="user">Usuario o correo:</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="Username" />
						</div>
						<div class="form-group">
							<label for="pwd">Contrase&ntilde;a:</label>
							<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" />
						</div>
						<div class="formLink">
							<a href="forgotten.php">Olvidaste tu contrase&ntilde;a?</a>
						</div>
						<div class="formLink">
							<a href="register.php">Crea una nueva cuenta</a>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-lg btn-primary center-block">Inicia sesi&oacute;n!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--<div class="col-xs-4 col-xs-offset-4 formContainer">
			<div class="formHeader">
				<img src="img/logo_white.png" class="img-responsive center-block formTitle"/>
			</div>
			<div class="formBody col-xs-12">
				<form role="form" action="" class="containedForm">
					<div class="form-group">
						<label for="user">User name or Email:</label>
						<input type="text" class="form-control" id="user" placeholder="Username" />
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" placeholder="Password"/>
					</div>
					<div class="formLink">
						<a href="">Forgot your password</a>
					</div>
					<div class="text-center">
					<button type="submit" class="btn btn-lg btn-primary center-block">Log In</button>
					</div>
				</form>
			</div>
		</div>-->
	</div>
	<!--</div>-->
	<!--<div class="container">
		<div class="row">
			<div class="col-md-12 bgimage">
				<div class="bgimage-inside">
					<form role="form" action="">
				<div class="form-group">
					<label for="user">User name or Email:</label>
					<input type="text" class="form-control" id="user" />
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" />
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
				</div>
			</div>
		</div>
	</div>-->
</body>
</html>

