<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-table fa-fw"></i><strong><?= TITULO_EVENTO; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<a href="<?= base_url(PATH_MENU)."/".EVENTO_ADD; ?>" class="btn btn-default"><i class="fa fa-table fa-fw"></i><strong>NUEVO</strong></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $evento_rules[IDEVE]['label']; ?></th>
									<th><?= $evento_rules[NOMBRE]['label']; ?></th>
									<th><?= $evento_rules[FECHA]['label']; ?></th>
									<th><?= $evento_rules[LIMITE_EMISION]['label']; ?></th>
									<th colspan="4"></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($evento){
		foreach($evento->result() as $evento_row){
?>
								<tr>
									<td><?= $evento_row->ideve; ?></td>
									<td><?= $evento_row->nombre; ?></td>
									<td><?= date("d/m/Y", strtotime($evento_row->fecha)); ?></td>
									<td><center><?= $evento_row->limite_emision; ?></center></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_GET."/".$evento_row->ideve; ?>" class="btn btn-default btn-xs"><i class="fa fa-info fa-fw"></i><strong>CONFIGURACION</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_ENTRADA_GETS."/".$evento_row->ideve; ?>" class="btn btn-default btn-xs"><i class="fa fa-ticket fa-fw"></i><strong>ENTRADAS</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_EDIT."/".$evento_row->ideve; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i><strong>EDITAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_DEL."/".$evento_row->ideve; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i><strong>ELIMINAR</strong></a></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="8"><center><h3>Sin Eventos asociados.</h3></center></td>
								</tr>
<?php
	}
?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-8 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->