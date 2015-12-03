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
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" >
	<style type="text/css">
	body {
		background-size: 100%;
		background-image: url("/Posdta/img/login_1920.jpg");
		//background-position: center;
	}
	.formContainer {
		vertical-align: middle;
		align-items: center;
		//display: flex;
		color: white;
	}

	.formHeader {
		background-color: rgba(0,0,0, 0.95);
		border-top-left-radius:10px;
		border-top-right-radius:10px;
	}

	.formBody {
		background-color: rgba(0,0,0, 0.85);
		padding-left: 10px;
		padding-right: 10px;
		border-bottom-right-radius:10px;
		border-bottom-left-radius:10px;
	}

	.containedForm {
		padding-top: 10px;
		padding-bottom: 20px;
	}

	.formLink {
		font-size: 10px;
		padding-bottom: 10px;
	}

	.formTitle {
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.formInstructions {
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.formQuote {
		padding-top: 15px;
	}

	.formQuote > .quote {
		font-size: 20px;
	}

	.formQuote > .author {
		font-size: 10px;
	}
	</style>
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
					<a href="index.php"><img src="img/posdta.png" class="img-responsive center-block formTitle"/></a>
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
	</div>
</body>
</html>
