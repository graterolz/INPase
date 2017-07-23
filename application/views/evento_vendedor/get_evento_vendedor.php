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
if ($usuario_vendedor){
	$usuario_vendedor_row = $usuario_vendedor->row();

	$usuario_vendedor_form = array(		
		NOMBRE => array(
			'class' => 'form-control',
			'name' => NOMBRE,
			'value' => $usuario_vendedor_row->nombre,
			'readonly' => TRUE
		),
		APELLIDO => array(
			'class' => 'form-control',
			'name' => APELLIDO,
			'value' => $usuario_vendedor_row->apellido,
			'readonly' => TRUE
		),
		TELEFONO => array(
			'class' => 'form-control',
			'name' => TELEFONO,
			'value' => $usuario_vendedor_row->telefono,
			'readonly' => TRUE
		),
		DIRECCION => array(
			'class' => 'form-control',
			'name' => DIRECCION,
			'value' => $usuario_vendedor_row->direccion,
			'readonly' => TRUE
		),
		EMAIL => array(
			'class' => 'form-control',
			'name' => EMAIL,
			'value' => $usuario_vendedor_row->email,
			'readonly' => TRUE
		),
		FACEBOOK => array(
			'class' => 'form-control',
			'name' => FACEBOOK,
			'value' => $usuario_vendedor_row->facebook,
			'readonly' => TRUE
		),
		TWITTER => array(
			'class' => 'form-control',
			'name' => TWITTER,
			'value' => $usuario_vendedor_row->twitter,
			'readonly' => TRUE
		),
		URL_FOTO => array(
			'class' => 'form-control',
			'name' => URL_FOTO,
			'value' => $usuario_vendedor_row->url_foto,
			'readonly' => TRUE
		)
	);
}
?>
			<!-- USUARIO_VENDEDOR -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-table fa-fw"></i><strong><?= TITULO_VENDEDOR; ?></strong>
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
											<?= $usuario_vendedor_form[NOMBRE]['value'].' '.$usuario_vendedor_form[APELLIDO]['value'];?>
										</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_vendedor_rules[TELEFONO]['label'],$usuario_vendedor_rules[TELEFONO]['field']); ?>
											<?= form_input($usuario_vendedor_form[TELEFONO]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_vendedor_rules[FACEBOOK]['label'],$usuario_vendedor_rules[FACEBOOK]['field']); ?>
											<?= form_input($usuario_vendedor_form[FACEBOOK]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_vendedor_rules[DIRECCION]['label'],$usuario_vendedor_rules[DIRECCION]['field']); ?>
											<?= form_input($usuario_vendedor_form[DIRECCION]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_vendedor_rules[TWITTER]['label'],$usuario_vendedor_rules[TWITTER]['field']); ?>
											<?= form_input($usuario_vendedor_form[TWITTER]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_vendedor_rules[EMAIL]['label'],$usuario_vendedor_rules[EMAIL]['field']); ?>
											<?= form_input($usuario_vendedor_form[EMAIL]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_vendedor_rules[URL_FOTO]['label'],$usuario_vendedor_rules[URL_FOTO]['field']); ?>
											<?= form_input($usuario_vendedor_form[URL_FOTO]); ?>
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

			<!-- EVENTO_TIPO_ENTRADA_VENDEDOR -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-ticket fa-fw"></i><strong><?= TITULO_EVENTO_TIPO_ENTRADA_VENDEDOR; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">							
							<a href="<?= base_url(PATH_MENU)."/".EVENTO_TIPO_ENTRADA_VENDEDOR_ADD."/".$ideveve; ?>" class="btn btn-default"><i class="fa fa-ticket fa-fw"></i><strong>NUEVO</strong></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $evento_tipo_entrada_vendedor_rules[IDEVETEVE]['label']; ?></th>
									<th><?= $evento_tipo_entrada_vendedor_rules[TIPO_ENTRADA]['label']; ?></th>
									<th><?= $evento_tipo_entrada_vendedor_rules[CANTIDAD_ENTRADA]['label']; ?></th>
									<th colspan="1"></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($evento_tipo_entrada_vendedor){
		foreach($evento_tipo_entrada_vendedor->result() as $evento_tipo_entrada_vendedor_row){
?>
								<tr>
									<td><?= $evento_tipo_entrada_vendedor_row->ideveteve; ?></td>
									<td><?= $evento_tipo_entrada_vendedor_row->descripcion; ?></td>
									<td><?= $evento_tipo_entrada_vendedor_row->cantidad_entrada; ?></td>
									<!--<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_TIPO_ENTRADA_VENDEDOR_EDIT."/".$evento_tipo_entrada_vendedor_row->ideveteve; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i><strong>EDITAR</strong></a></td>-->
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_TIPO_ENTRADA_VENDEDOR_DEL."/".$evento_tipo_entrada_vendedor_row->ideveteve; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i><strong>ELIMINAR</strong></a></td>
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



		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->   
</div>
<!-- /#page-wrapper -->