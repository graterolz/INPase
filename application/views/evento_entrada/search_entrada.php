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
	if ($evento_entrada == TRUE){
		echo '<b>ID de Entrada: </b>'.$evento_entrada->row()->ident.'<br>';
		echo '<b>Tipo de Entrada: </b>'.$evento_tipo_entrada->row()->descripcion.'<br>';
		echo '<b>Nombre del Comprador: </b>'.$evento_entrada->row()->nombre_comprador.'<br>';
		echo '<b>Email del Comprador: </b>'.$evento_entrada->row()->email_comprador.'<br>';
		echo '<b>Estado de Entrada: </b>'.$evento_entrada->row()->estado_entrada.'<br>';
		echo '<b>Vendida el dia: </b>'.date("d/m/Y H:m:s", strtotime($evento_entrada->row()->fecha_registro)).'<br>';
		echo '</br>';
		echo '<b>Evento ID: </b>'.$evento->row()->ideve.'<br>';
		echo '<b>Nombre del Evento: </b>'.$evento->row()->nombre.'<br>';
		echo '<b>Fecha del Evento: </b>'.date("d/m/Y H:m:s", strtotime($evento->row()->fecha)).'<br>';
		echo '</br>';

		if($evento_entrada->row()->estado_entrada == ESTADO_ENTRADA_VENDIDA){
echo '<a href="'.base_url(PATH_MENU).'/'.EVENTO_ENTRADA_EDIT.'/'.$evento_entrada->row()->ident.'" class="btn btn-success btn"><i class="fa fa-ticket fa-fw"></i><strong>DAR ACCESO</strong></a>';
		}else{
			echo "<b>Entrada validada, Usuario ya ingresado al evento.<b>";
		}
	}
	else{
		echo $evento_entrada;
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