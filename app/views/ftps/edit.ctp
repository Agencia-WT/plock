<h2>Editar FTP '<?php echo $ftp['Ftp']['host'] ?>'</h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="FtpAddForm" method="post" action="" accept-charset="utf-8">
	<fieldset>
		<legend>Dados do FTP</legend>
		<div class="row">
			<div class="span8">
				<div class="clearfix">
				     <label for="xlInput">Domínio</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][dominio]" value="<?php echo $ftp['Ftp']['dominio']?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="xlInput">Host</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][host]" value="<?php echo $ftp['Ftp']['host']?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Username</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][username]" value="<?php echo $ftp['Ftp']['username']?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Ftp][password]" value="<?php echo $ftp['Ftp']['password']?>"size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="actions"> 
					<input type="hidden" name="data[Ftp][id]" value="<?php echo $ftp['Ftp']['id'] ?>">
				    <button class="btn primary">Salvar FTP</button>
				
					<input type="button" class="btn " value="Cancelar" onClick="history.back();">
				</div><!-- /actions -->
			</div>
		</div>
	</fieldset>
</form>