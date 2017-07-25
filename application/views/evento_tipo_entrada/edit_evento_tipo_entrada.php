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
<?php
if($evento_tipo_entrada){
	$evento_tipo_entrada_row = $evento_tipo_entrada->row();

	$tipo_evento_form = array(
		DESCRIPCION => array(
			'class' => 'form-control',
			'name' => DESCRIPCION,
			'placeholder' => $evento_tipo_entrada_rules[DESCRIPCION]['label'],
			'value' => $evento_tipo_entrada_row->descripcion,
			'required' => TRUE
		),
		PRECIO => array(
			'class' => 'form-control',
			'name' => PRECIO,
			'placeholder' => $evento_tipo_entrada_rules[PRECIO]['label'],
			'value' => $evento_tipo_entrada_row->precio,
			'required' => TRUE
		),
		CANTIDAD => array(
			'class' => 'form-control',
			'name' => CANTIDAD,
			'placeholder' => $evento_tipo_entrada_rules[CANTIDAD]['label'],
			'value' => $evento_tipo_entrada_row->cantidad,
			'required' => TRUE
		),
	);
}
?>
			<?= form_open('',$form_attributes);?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-ticket fa-fw"></i><strong><?= TITULO_EVENTO_TIPO_ENTRADA; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-default"><i class="fa fa-ticket fa-fw"></i><strong>EDITAR</strong></button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="well">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="row">
										<div class="col-lg-4">
											<?= form_label($evento_tipo_entrada_rules[DESCRIPCION]['label']);?>
											<?= form_input($tipo_evento_form[DESCRIPCION]); ?>
										</div>
										<div class="col-lg-4">
											<?= form_label($evento_tipo_entrada_rules[PRECIO]['label']);?>
											<?= form_input($tipo_evento_form[PRECIO]); ?>
										</div>
										<div class="col-lg-4">
											<?= form_label($evento_tipo_entrada_rules[CANTIDAD]['label']);?>
											<?= form_input($tipo_evento_form[CANTIDAD]); ?>
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