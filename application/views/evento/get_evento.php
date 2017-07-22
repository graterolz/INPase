<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<br>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
<?php
if ($evento){
	$evento_row = $evento->row();

	$evento_form = array(
		NOMBRE => array(
			'class' => 'form-control',
			'name' => NOMBRE,
			'value' => $evento_row->nombre,
			'readonly' => TRUE
		),
		FECHA => array(
			'class' => 'form-control',
			'name' => FECHA,
			'value' => date("d/m/Y", strtotime($evento_row->fecha)),
			'readonly' => TRUE
		),
		LIMITE_EMISION => array(
			'class' => 'form-control',
			'name' => LIMITE_EMISION,
			'value' => $evento_row->limite_emision,
			'readonly' => TRUE
		)
	);
}
?>
			<!-- EVENTO -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-table fa-fw"></i><strong><?= TITULO_EVENTO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="well">
								<div class="row">
									<div class="col-lg-12">
										<h4>
											<?= $evento_form[NOMBRE]['value'];?>
										</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<?= form_label($evento_rules[FECHA]['label'],$evento_rules[FECHA]['field']); ?>
											<?= form_input($evento_form[FECHA]); ?>
										</div> 
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-6">
										<div class="form-group">
											<?= form_label($evento_rules[LIMITE_EMISION]['label'],$evento_rules[LIMITE_EMISION]['field']); ?>
											<?= form_input($evento_form[LIMITE_EMISION]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
								</div>
							</div>
						</div>
						<!-- /.col-lg-12 (nested) -->
					</div>
					<!-- /.row (nested) -->
				</div>
			</div>
			<!-- /.panel -->

			<!-- EVENTO_TIPO_ENTRADA -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-ticket fa-fw"></i><strong><?= TITULO_EVENTO_TIPO_ENTRADA; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">							
							<a href="<?= base_url(PATH_MENU)."/".EVENTO_TIPO_ENTRADA_ADD."/".$evento_row->ideve; ?>" class="btn btn-default"><i class="fa fa-ticket fa-fw"></i><strong>NUEVO</strong></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $evento_tipo_entrada_rules[IDEVETE]['label']; ?></th>
									<th><?= $evento_tipo_entrada_rules[DESCRIPCION]['label']; ?></th>
									<th><?= $evento_tipo_entrada_rules[PRECIO]['label']; ?></th>
									<th><?= $evento_tipo_entrada_rules[CANTIDAD]['label']; ?></th>
									<th colspan="2"></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($evento_tipo_entrada){
		foreach($evento_tipo_entrada->result() as $evento_tipo_entrada_row){
?>
								<tr>
									<td><?= $evento_tipo_entrada_row->idevete; ?></td>
									<td><?= $evento_tipo_entrada_row->descripcion; ?></td>
									<td><?= $evento_tipo_entrada_row->precio; ?></td>
									<td><?= $evento_tipo_entrada_row->cantidad; ?></td>									
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_TIPO_ENTRADA_EDIT."/".$evento_tipo_entrada_row->idevete; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i><strong>EDITAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_TIPO_ENTRADA_DEL."/".$evento_tipo_entrada_row->idevete; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i><strong>ELIMINAR</strong></a></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="5"><center><h3>Sin tipo de entradas asociadas.</h3></center></td>
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

			<!-- USUARIO_VENDEDOR -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-user fa-fw"></i><strong><?= TITULO_VENDEDOR; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">							
							<a href="<?= base_url(PATH_MENU)."/".EVENTO_VENDEDOR_ADD."/".$evento_row->ideve; ?>" class="btn btn-default"><i class="fa fa-user fa-fw"></i><strong>NUEVO</strong></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $evento_vendedor_rules[IDEVEVE]['label']; ?></th>
									<th><?= $usuario_vendedor_rules[NOMBRE]['label']; ?></th>
									<th><?= $usuario_vendedor_rules[APELLIDO]['label']; ?></th>
									<th><?= $usuario_vendedor_rules[EMAIL]['label']; ?></th>
									<th colspan="2"></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($usuario_vendedor){
		foreach($usuario_vendedor->result() as $usuario_vendedor_row){
?>
								<tr>
									<td><?= $usuario_vendedor_row->ideveve; ?></td>
									<td><?= $usuario_vendedor_row->nombre; ?></td>
									<td><?= $usuario_vendedor_row->apellido; ?></td>
									<td><?= $usuario_vendedor_row->email; ?></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_VENDEDOR_GET."/".$usuario_vendedor_row->ideveve; ?>" class="btn btn-success btn-xs"><i class="fa fa-search fa-fw"></i><strong>VER</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_VENDEDOR_DEL."/".$usuario_vendedor_row->ideveve; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i><strong>ELIMINAR</strong></a></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="5"><center><h3>Sin vendedores asociados.</h3></center></td>
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
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->   
</div>
<!-- /#page-wrapper -->