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
	$evento_form = array(
		NOMBRE => array(
			'class' => 'form-control',
			'name' => NOMBRE,
			'placeholder' => $evento_rules[NOMBRE]['label'],
			'required' => TRUE
		),
		LUGAR => array(
			'class' => 'form-control',
			'name' => LUGAR,
			'placeholder' => $evento_rules[LUGAR]['label'],
			'required' => TRUE
		),		
		FECHA => array(
			'class' => 'form-control',
			'name' => FECHA,
			'placeholder' => $evento_rules[FECHA]['label'],
			'required' => TRUE
		),
		LIMITE_EMISION => array(
			'class' => 'form-control',
			'name' => LIMITE_EMISION,
			'placeholder' => $evento_rules[LIMITE_EMISION]['label'],
			'required' => TRUE
		)
	);
?>
			<?= form_open('',$form_attributes);?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-table fa-fw"></i><strong><?= TITULO_EVENTO; ?></strong>
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
											<?= form_label($evento_rules[NOMBRE]['label']);?>
											<?= form_input($evento_form[NOMBRE]); ?>
											<br>
										</div>
										<div class="col-lg-12">
											<?= form_label($evento_rules[LUGAR]['label']);?>
											<?= form_input($evento_form[LUGAR]); ?>
											<br>
										</div>
										<div class="col-lg-12">
											<?= form_label($evento_rules[FECHA]['label']);?>
											<?= form_input($evento_form[FECHA]); ?>
											<br>
										</div>
										<div class="col-lg-12">
											<?= form_label($evento_rules[LIMITE_EMISION]['label']); ?>
											<?= form_dropdown(NULL,$limite_emision,NULL,$evento_form[LIMITE_EMISION]); ?>
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