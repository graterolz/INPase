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
	$evento_entrada_form = array(
		NOMBRE_EVENTO => array(
			'class' => 'form-control',
			'name' => NOMBRE_EVENTO,
			'value' => $evento->row()->nombre,
			'placeholder' => $evento_entrada_rules[NOMBRE_EVENTO]['label'],
			'required' => TRUE,
			'readonly' => TRUE
		),
		NOMBRE_USUARIO => array(
			'class' => 'form-control',
			'name' => NOMBRE_USUARIO,
			'placeholder' => $evento_entrada_rules[NOMBRE_USUARIO]['label'],
			'value' => $usuario_vend->row()->nombre.' '.$usuario_vend->row()->apellido,
			'required' => TRUE,
			'readonly' => TRUE            
		),
		TIPO_ENTRADA => array(
			'class' => 'form-control',
			'name' => TIPO_ENTRADA,
			'required' => TRUE
		),
		NOMBRE_COMPRADOR => array(
			'class' => 'form-control',
			'name' => NOMBRE_COMPRADOR,
			'placeholder' => $evento_entrada_rules[NOMBRE_COMPRADOR]['label'],
			'required' => TRUE
		),
		EMAIL_COMPRADOR => array(
			'type' => 'email',
			'class' => 'form-control',
			'name' => EMAIL_COMPRADOR,			
			'placeholder' => $evento_entrada_rules[EMAIL_COMPRADOR]['label'],
			'required' => TRUE
		)
	);
	//var_dump($evento_usuario->row());
?>
			<?= form_open('',$form_attributes);?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<a href="<?= base_url(PATH_MENU)."/".EVENTO_CONTROLLER; ?>">
									<i class="fa fa-table fa-fw"></i><strong><?= MENU_EVENTO; ?></strong>
								</a>
							</div>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-default"><i class="fa fa-table fa-fw"></i><strong>NUEVO</strong></button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="well">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<?= form_label($evento_entrada_rules[NOMBRE_EVENTO]['label']);?>
											<?= form_input($evento_entrada_form[NOMBRE_EVENTO]); ?>
											<br>
										</div>
										<div class="col-lg-12">
											<?= form_label($evento_entrada_rules[NOMBRE_USUARIO]['label']);?>
											<?= form_input($evento_entrada_form[NOMBRE_USUARIO]); ?>
											<br>
										</div>
										<div class="col-lg-12">
											<?= form_label($evento_entrada_rules[TIPO_ENTRADA]['label']);?>
											<?= form_dropdown(NULL,$tipo_entrada_vend,NULL,$evento_entrada_form[TIPO_ENTRADA]); ?>
											<br>
										</div>
										<div class="col-lg-12">
											<?= form_label($evento_entrada_rules[NOMBRE_COMPRADOR]['label']);?>
											<?= form_input($evento_entrada_form[NOMBRE_COMPRADOR]); ?>
											<br>
										</div>
										<div class="col-lg-12">
											<?= form_label($evento_entrada_rules[EMAIL_COMPRADOR]['label']);?>
											<?= form_input($evento_entrada_form[EMAIL_COMPRADOR]); ?>
											<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?= form_close(); ?>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->