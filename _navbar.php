<nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="img/posdta.png" class="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-right">
          	<div class="login-details">
				<?php if(isset($_SESSION[SID])) { ?>
				<div class="user-img">
					<img class="user-img" src="<?php echo $_SESSION[ICON];?>">
				</div>
				<div class="user-name"><?php echo $_SESSION[DISPLAY_NAME];?></div>
				<?php } else {?>
				<div class="user-name"><a href="login.php">Inicia sesion</a></div>
				<?php } ?>
			</div>
          </div>
          <form class="navbar-form navbar-right" role="search" action="search.php">
        	<div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="query" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div><!--/.navbar-collapse -->
      </div>
</nav>
<script>
	var isLogged = true;
	<?php
		foreach($_REQUEST as $key => $value) {
			echo "var p_".$key." = '".$value."';";
		}
	?>
</script>
