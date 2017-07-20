<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?= TITULO_MENU; ?> - Registro</h3>
					</div>
					<div class="panel-body">
						<?= form_open('', array('role' => 'form','autocomplete' => 'off')) ?>
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Campo1" name="campo1" type="text" autofocus required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Campo2" name="campo2" type="text" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Campo3" name="campo3" type="text" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Campo4" name="campo4" type="text" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Campo5" name="campo5" type="text" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Campo6" name="campo6" type="text" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Campo7" name="campo7" type="text" value="" required>
								</div>
								<!-- Change this to a button or input when using this as a form -->
								<input type="submit" class="btn btn-lg btn-primary btn-block" value="Registrar">
								<a href="<?= base_url(PATH_MENU)."/".USUARIO_LOGIN; ?>" class="btn btn-lg btn-success btn-block">Atras</a>
							</fieldset>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>