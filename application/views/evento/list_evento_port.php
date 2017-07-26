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
<?php
//var_dump($usuario_vendedor);
//var_dump($evento_usuario);
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
			<!-- USUARIO -->
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
											<?= form_label($usuario_rol_rules[TELEFONO]['label'],$usuario_rol_rules[TELEFONO]['field']); ?>
											<?= form_input($usuario_vendedor_form[TELEFONO]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_rol_rules[FACEBOOK]['label'],$usuario_rol_rules[FACEBOOK]['field']); ?>
											<?= form_input($usuario_vendedor_form[FACEBOOK]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_rol_rules[DIRECCION]['label'],$usuario_rol_rules[DIRECCION]['field']); ?>
											<?= form_input($usuario_vendedor_form[DIRECCION]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_rol_rules[TWITTER]['label'],$usuario_rol_rules[TWITTER]['field']); ?>
											<?= form_input($usuario_vendedor_form[TWITTER]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_rol_rules[EMAIL]['label'],$usuario_rol_rules[EMAIL]['field']); ?>
											<?= form_input($usuario_vendedor_form[EMAIL]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_rol_rules[URL_FOTO]['label'],$usuario_rol_rules[URL_FOTO]['field']); ?>
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

			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-table fa-fw"></i><strong><?= MENU_EVENTO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $evento_usuario_rules[IDEVEVE]['label']; ?></th>
									<th><?= $evento_rules[NOMBRE]['label']; ?></th>
									<th><?= $evento_rules[FECHA]['label']; ?></th>
									<th><?= $evento_rules[LIMITE_EMISION]['label']; ?></th>
									<th colspan="1"></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($evento){
		foreach($evento->result() as $evento_row){
			//$idusu = $this->session->userdata(IDUSU_SESSION);
?>                            
								<tr>
									<td><?= $evento_row->ideveve; ?></td>
									<td><?= $evento_row->nombre; ?></td>
									<td><?= date("d/m/Y", strtotime($evento_row->fecha)); ?></td>
									<td><center><?= $evento_row->limite_emision; ?></center></td>
									<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_ENTRADA_SEARCH."/".$evento_row->ideveve; ?>" class="btn btn-success btn-xs"><i class="fa fa-ticket fa-fw"></i><strong> BUSCAR ENTRADA</strong></a></td>
									<!--<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_ENTRADA_GETSS."/".$evento_row->ideveve; ?>" class="btn btn-default btn-xs"><i class="fa fa-search fa-fw"></i><strong>VER ENTRADAS</strong></a></td>-->
								</tr>
<?php
		}
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