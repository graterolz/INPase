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

	$evento_tipo_entrada_vendedor_form = array(
		TIPO_ENTRADA => array(
			'class' => 'form-control',
			'name' => TIPO_ENTRADA,
			'required' => TRUE
		),
		CANTIDAD_ENTRADA => array(
			'class' => 'form-control',
			'name' => CANTIDAD_ENTRADA,
			'placeholder' => $evento_tipo_entrada_vendedor_rules[CANTIDAD_ENTRADA]['label'],
			'required' => TRUE			
		)
	);
}
?>
			<!-- USUARIO_ROL -->
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

			<!-- EVENTO_TIPO_ENTRADA_VENDEDOR -->
			<?= form_open('',$form_attributes);?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-ticket fa-fw"></i><strong><?= TITULO_EVENTO_TIPO_ENTRADA_VENDEDOR; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-default"><i class="fa fa-ticket fa-fw"></i><strong>NUEVO</strong></button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="well">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<?= form_label($evento_tipo_entrada_vendedor_rules[TIPO_ENTRADA]['label'],$evento_tipo_entrada_vendedor_rules[TIPO_ENTRADA]['field']); ?>
												<?= form_dropdown(NULL,$evento_tipo_entrada_vendedor,NULL,$evento_tipo_entrada_vendedor_form[TIPO_ENTRADA]); ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<?= form_label($evento_tipo_entrada_vendedor_rules[CANTIDAD_ENTRADA]['label'],$evento_tipo_entrada_vendedor_rules[CANTIDAD_ENTRADA]['field']); ?>
												<?= form_input($evento_tipo_entrada_vendedor_form[CANTIDAD_ENTRADA]); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.panel -->
			<?= form_close(); ?>

		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->