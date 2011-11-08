<h2>Cadastrar Domínio para o cliente <?php echo $cliente['Cliente']['nome'] ?></h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="FtpAddForm" method="post" action="<?php echo Configure::read('BASE_URL'); ?>dominios/add/<?php echo $cliente['Cliente']['id'] ?>" accept-charset="utf-8">
	<fieldset>
		<legend>Dados do Domínio</legend>
		<div class="row">
			<div class="span8">
				<div class="clearfix">
				     <label for="dominio_url">Url</label>
				     <div class="input">
				         <input class="xlarge" id="dominio_url" name="data[Dominio][url]" placeholder="ex: www.teste.com.br" size="30" type="text" tabindex="1" />
				     </div>
				</div><!-- /clearfix -->	
				<div class="clearfix">
				     <label for="dominio_servidor">Servidor</label>
				     <div class="input">
				         <select name="data[Dominio][servers_id]" id="dominio_servidor" tabindex="2">
				         	<option value="">---</option>
						 	<?php foreach($servers as $s){ ?>
								<option value="<?php echo $s['Server']['id'] ?>"><?php echo $s['Server']['nome'] ?></option>
							<?php } ?>
						 </select>
				      </div>
				</div><!-- /clearfix -->			
				<div class="clearfix">
				     <label for="dominio_ftp_host">FTP Host</label>
				     <div class="input">
				         <input class="xlarge" id="dominio_ftp_host" name="data[Dominio][ftp_host]" placeholder="ex: ftp.teste.com.br" size="30" type="text" tabindex="2" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="dominio_ftp_username">FTP Username</label>
				     <div class="input">
				         <input class="xlarge" id="dominio_ftp_username" name="data[Dominio][ftp_username]" size="30" placeholder="ex: teste" type="text" tabindex="3" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="dominio_ftp_senha">FTP Senha</label>
				     <div class="input">
				         <input class="xlarge" id="mominio_ftp_senha" name="data[Dominio][ftp_password]" size="30" placeholder="ex: jn7USnskd8" type="text" tabindex="4" />
				      </div>
				</div><!-- /clearfix -->
				<div class="actions"> 
					<input type="hidden" name="data[Dominio][clientes_id]" value="<?php echo $cliente['Cliente']['id'] ?>">
				    <button class="btn primary" tabindex="5">Salvar Domínio</button>
					<input type="button" class="btn " value="Cancelar" onClick="history.back();" tabindex="6">
				</div><!-- /actions -->
			</div>
		</div>
	</fieldset>
</form>