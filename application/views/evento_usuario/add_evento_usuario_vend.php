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
		LUGAR => array(
			'class' => 'form-control',
			'name' => LUGAR,
			'value' => $evento_row->lugar,
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

	$evento_usuario_form = array(
		NOMBRE_VENDEDOR => array(
			'class' => 'form-control',
			'name' => NOMBRE_VENDEDOR,
			'required' => TRUE	
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
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($evento_rules[FECHA]['label'],$evento_rules[FECHA]['field']); ?>
											<?= form_input($evento_form[FECHA]); ?>
										</div> 
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($evento_rules[LUGAR]['label'],$evento_rules[LUGAR]['field']); ?>
											<?= form_input($evento_form[LUGAR]); ?>
										</div> 
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($evento_rules[LIMITE_EMISION]['label'],$evento_rules[LIMITE_EMISION]['field']); ?>
											<?= form_input($evento_form[LIMITE_EMISION]); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.col-lg-12 (nested) -->
					</div>
					<!-- /.row (nested) -->
				</div>
			</div>
			<!-- /.panel -->

			<!-- USUARIO_ROL -->
			<?= form_open('',$form_attributes);?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-user fa-fw"></i><strong><?= TITULO_VENDEDOR; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-default"><i class="fa fa-user fa-fw"></i><strong>NUEVO</strong></button>
							<!--<a href="<?= base_url(PATH_MENU)."/".EVENTO_USUARIO_ADD_VEND."/".$evento_row->ideve; ?>" class="btn btn-default"><i class="fa fa-user fa-fw"></i><strong>NUEVO</strong></a>-->
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="well">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="row">
										<div class="col-lg-3">
										</div>
										<div class="col-lg-3">
											<?= form_label($usuario_rol_rules[NOMBRE_VENDEDOR]['label'],$usuario_rol_rules[NOMBRE_VENDEDOR]['field']); ?>
										</div>
										<div class="col-lg-3">
											<?= form_dropdown(NULL,$evento_usuario,NULL,$evento_usuario_form[NOMBRE_VENDEDOR]); ?>
										</div>
										<div class="col-lg-3">
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