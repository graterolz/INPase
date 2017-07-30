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


<?php
	$evento_entrada_form = array(
		IDENT => array(
			'class' => 'form-control',
			'name' => IDENT,
			'placeholder' => $evento_entrada_rules[IDENT]['label'],
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
								<i class="fa fa-ticket fa-fw"></i><strong><?= TITULO_EVENTO_ENTRADA; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-default"><i class="fa fa-ticket fa-fw"></i><strong>BUSCAR</strong></button>
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
											<br>
											<?= form_label($evento_entrada_rules[IDENT]['label']); ?>
											<?= form_input($evento_entrada_form[IDENT]); ?>
											<br>
										</div>
										<div class="col-lg-12">
<?php
	//var_dump($evento_entrada2->result_array());
	if ($evento_entrada == TRUE){
		echo '<b>ID de Entrada: </b>'.$evento_entrada->row()->ident.'<br>';
		// echo '<b>Tipo de Entrada: </b>'.$evento_tipo_entrada->row()->descripcion.'<br>';
		echo '<b>Nombre del Comprador: </b>'.$evento_entrada->row()->nombre_comprador.'<br>';
		echo '<b>Email del Comprador: </b>'.$evento_entrada->row()->email_comprador.'<br>';
		echo '<b>Estado de Entrada: </b>'.$evento_entrada->row()->estado_entrada.'<br>';
		echo '<b>Vendida el dia: </b>'.date("d/m/Y H:m:s", strtotime($evento_entrada->row()->fecha_registro)).'<br>';
		echo '</br>';

		if($evento_entrada->row()->estado_entrada == ESTADO_ENTRADA_ASIGNADA){
			echo '<a href="'.base_url(PATH_MENU).'/'.EVENTO_ENTRADA_EDIT.'/'.$evento_entrada->row()->ident.'" class="btn btn-success btn"><i class="fa fa-ticket fa-fw"></i><strong>DAR ACCESO</strong></a>';
		}else{
			echo "<b>Entrada validada, Usuario ya ingresado al evento.<b>";
		}
	}
	else{
		echo $evento_entrada;
		//echo "string";
	}
?>
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