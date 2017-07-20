<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?= TITULO_MENU; ?> - Autentificacion</h3>
					</div>
					<div class="panel-body">
						<?= form_open('', array('role' => 'form','autocomplete' => 'off')) ?>
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="User" name="user" type="text" autofocus required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="pass" type="password" value="" required>
								</div>
								<!--
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me">Remember Me
									</label>
								</div>
								-->
								<!-- Change this to a button or input when using this as a form -->
								<input type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
								<a href="<?= base_url(PATH_MENU)."/". USUARIO_REGISTER; ?>" class="btn btn-lg btn-success btn-block">Registro</a>
							</fieldset>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>


