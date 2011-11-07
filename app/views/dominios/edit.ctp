<h2>Editar Domínio '<?php echo $dominio['Dominio']['url'] ?>'</h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="FtpAddForm" method="post" action="" accept-charset="utf-8">
	<fieldset>
		<legend>Dados do Domínio</legend>
		<div class="row">
			<div class="span8">
				<div class="clearfix">
				     <label for="dominio_url">Url</label>
				     <div class="input">
				         <input class="xlarge" id="dominio_url" name="data[Dominio][url]" value="<?php echo $dominio['Dominio']['url'] ?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="dominio_servidor">Servidor</label>
				     <div class="input">
				         <select name="data[Dominio][servers_id]" id="dominio_servidor" tabindex="2">
				         	<option value="">---</option>
						 	<?php 
						 	foreach($servers as $s) 
						 	{ 
								if ( $s['Server']['id'] == $dominio['Dominio']['servers_id'] || $s['Server']['id'] == $server_select )
								{
									$selected = 'selected';
								}
								else
								{
									$selected = '';
								}

								?>
								
								<option value="<?php echo $s['Server']['id'] ?>" <?php echo $selected ?>><?php echo $s['Server']['nome'] ?></option>
							<?php 
							} ?>
						 </select>
				      </div>
				</div><!-- /clearfix -->			
				<div class="clearfix">
				     <label for="dominio_ftp_host">FTP Host</label>
				     <div class="input">
				         <input class="xlarge" id="dominio_ftp_host" name="data[Dominio][ftp_host]" value="<?php echo $dominio['Dominio']['ftp_host'] ?>" size="30" type="text" tabindex="3" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="dominio_ftp_username">FTP Username</label>
				     <div class="input">
				         <input class="xlarge" id="dominio_ftp_username" name="data[Dominio][ftp_username]" value="<?php echo $dominio['Dominio']['ftp_username'] ?>" size="30" type="text" tabindex="4" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="dominio_ftp_senha">FTP Senha</label>
				     <div class="input">
				         <input class="xlarge" id="dominio_ftp_senha" name="data[Dominio][ftp_password]" value="<?php echo $dominio['Dominio']['ftp_password'] ?>"size="30" type="text" tabindex="5" />
				      </div>
				</div><!-- /clearfix -->
				<div class="actions"> 
					<input type="hidden" name="data[Dominio][id]" value="<?php echo $dominio['Dominio']['id'] ?>">
				    <button class="btn primary" tabindex="6">Salvar Domínio</button>
				
					<input type="button" class="btn " value="Cancelar" onClick="history.back();" tabindex="7">
				</div><!-- /actions -->
			</div>
		</div>
	</fieldset>
</form>