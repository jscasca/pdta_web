<?php
if(isset($_SESSION[SID])){}
?>
<nav role="navigation" class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand-image"><img src="img/logo_white.png" class="navlogo"/></a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <form role="search" class="navbar-form navbar-left" action="search.php">
                <div class="form-group">
                    <input type="text" placeholder="Search" name="q" class="form-control">
                </div>
            </form>
            <!--<ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Messages <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
            </ul>-->
            <ul class="nav navbar-nav navbar-right">
                <?php	if(!isset($_SESSION[SID])) { ?>
				<li><a href="login.php">Inicia Session</a></li>
				<?php	} else { ?>
				<li><a href="me.php">Perfil</a></li>	
				<li><a href="#">Seguidores</a></li>	
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"><img src="img/defaultUser.png" class="profilePic" >Tin Kalzetin</a>
					<ul role="menu" class="dropdown-menu">
						<li><a href="#">Configuracion</a></li>
						<li><a href="logout.php">Salir</a></li>
					</ul>
				</li>	
				<?php	} ?>
            </ul>
        </div>
    </nav>
