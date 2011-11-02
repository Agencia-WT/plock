<h2>Cadastrar FTP para o cliente <?php echo $cliente['Cliente']['nome'] ?></h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="FtpAddForm" method="post" action="/plock/ftps/add/<?php echo $cliente['Cliente']['id'] ?>" accept-charset="utf-8">
	<fieldset>
		<legend>Dados do FTP</legend>
		<div class="row">
			<div class="span8">
				<div class="clearfix">
				     <label for="xlInput">Domínio</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][dominio]" placeholder="ex: www.teste.com.br" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="xlInput">Host</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][host]" placeholder="ex: ftp.teste.com.br" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Username</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][username]" size="30" placeholder="ex: teste" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][password]" size="30" placeholder="ex: jn7USnskd8" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="actions"> 
					<input type="hidden" name="data[Ftp][clientes_id]" value="<?php echo $cliente['Cliente']['id'] ?>">
				    <button class="btn primary">Salvar FTP</button>
					<a href="/plock/clientes/view/<?php echo $cliente['Cliente']['id'] ?>"><input type="button" class="btn " value="Cancelar"></a>
				</div><!-- /actions -->
			</div>
		</div>
	</fieldset>
</form>