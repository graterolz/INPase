<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$idusu = $this->session->userdata(IDUSU_SESSION);
$idrol = $this->session->userdata(IDROL_SESSION);
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= base_url(PATH_MENU)."/".USUARIO_CONTROLLER; ?>"><?= TITULO_MENU; ?></a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user fa-fw"></i><strong><?= $idrol; ?></strong>
					</a>
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">				
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
<?php
	if($idrol==ORGA){
?> 
	<li>
		<a href="<?= base_url(PATH_MENU)."/".EVENTO_CONTROLLER; ?>"><i class="fa fa-table fa-fw"></i><?= MENU_EVENTO; ?></a>
	</li>
<?php
}
if($idrol==VEND || $idrol==PORT){
?> 
	<li>
		<a href="<?= base_url(PATH_MENU)."/".EVENTO_CONTROLLER; ?>"><i class="fa fa-table fa-fw"></i><?= MENU_EVENTO; ?></a>
	</li>
<?php
}
/*if($idrol==PORT){
?>
	<li>
		<a href="<?= base_url(PATH_MENU)."/".EVENTO_ENTRADA_SEARCH; ?>"><i class="fa fa-ticket fa-fw"></i><?= MENU_ENTRADA_SEARCH; ?></a>
	</li>
<?php
}*/
?>
						<li>
							<a href="<?= base_url(PATH_MENU)."/".USUARIO_LOGOUT; ?>"><i class="fa fa-sign-out fa-fw"></i><?= MENU_LOGOUT; ?></a>
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>