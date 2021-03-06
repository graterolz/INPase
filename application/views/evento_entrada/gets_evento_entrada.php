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
			

			<!-- EVENTO_ENTRADA -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-ticket fa-fw"></i><strong><?= TITULO_EVENTO_ENTRADA; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<!--<a href="<?= base_url(PATH_MENU)."/".EVENTO_ADD; ?>" class="btn btn-default"><i class="fa fa-table fa-fw"></i><strong>NUEVO</strong></a>-->
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $evento_entrada_rules[IDENT]['label']; ?></th>
									<th><?= $evento_entrada_rules[NOMBRE_COMPRADOR]['label']; ?></th>
									<th><?= $evento_entrada_rules[EMAIL_COMPRADOR]['label']; ?></th>
									<th><?= $evento_entrada_rules[ESTADO_ENTRADA]['label']; ?></th>
									<th colspan="1"></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($evento_entrada){
		foreach($evento_entrada->result() as $evento_entrada_row){
?>
								<tr>
									<td><?= $evento_entrada_row->ident; ?></td>
									<td><?= $evento_entrada_row->nombre_comprador; ?></td>
									<td><?= $evento_entrada_row->email_comprador; ?></td>
									<td><?= $evento_entrada_row->estado_entrada; ?></td>
									<td><a href="#" class="btn btn-default btn-xs"><i class="fa fa-ticket fa-fw"></i><strong>VER</strong></a></td>
									<!--<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_ENTRADA_GET."/".$evento_entrada_row->ident; ?>" class="btn btn-default btn-xs"><i class="fa fa-ticket fa-fw"></i><strong>VER</strong></a></td>-->
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="5"><center><h3>Sin entradas asociadas.</h3></center></td>
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