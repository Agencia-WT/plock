<h2>Editar Cliente <?php echo $cliente['Cliente']['nome'] ?></h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="ClienteAddForm" method="post" action="" accept-charset="utf-8">
	<fieldset>
		<legend>Dados Pessoais</legend>
		<div class="row">
			<div class="span8">
				
				<div class="clearfix">
				     <label for="xlInput">Nome</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][nome]" value="<?php echo $cliente['Cliente']['nome'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Contato 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][contato_1]" value="<?php echo $cliente['Cliente']['contato_1'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Contato 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][contato_2]" value="<?php echo $cliente['Cliente']['contato_2'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Telefone 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][telefone_1]" value="<?php echo $cliente['Cliente']['telefone_1'] ?>" size="30" type="text"/>
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Telefone 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][telefone_2]" value="<?php echo $cliente['Cliente']['telefone_2'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->				
				<hr>
				<legend>Email</legend>
				<br/>
				<div class="clearfix">
				     <label for="xlInput">Email 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][email_1]" value="<?php echo $cliente['Cliente']['email_1'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][senha_1]" value="<?php echo $cliente['Cliente']['senha_1'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="xlInput">Email 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][email_2]" value="<?php echo $cliente['Cliente']['email_2'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][senha_2]" value="<?php echo $cliente['Cliente']['senha_2'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->				
			</div><!-- /span6 -->	
			<div class="span8">

				<div class="clearfix">
				     <label for="xlInput">FTP</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][ftp]" value="<?php echo $cliente['Cliente']['ftp'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha do FTP</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][senha_ftp]" value="<?php echo $cliente['Cliente']['senha_ftp'] ?>" size="30" type="text" />
				      </div>
				</div><!-- /clearfix -->
				<hr>
				<div class="clearfix">
				     <label for="xlInput">Observações</label>
				     <div class="input">
				        <textarea class="span5" id="textarea2" rows="10" name="data[Cliente][observacoes]"><?php echo $cliente['Cliente']['observacoes'] ?></textarea> 
						<span class="help-block">
							Digite aqui informações complementares como endereço, sites de referência para o projeto, etc ..
						</span>
				      </div>
				</div><!-- /clearfix -->
				<hr>				
				<div class="actions"> 
				    <button class="btn primary">Salvar Cliente</button>
				</div><!-- /actions -->								
			</div>	
		</div>
	</fieldset>
</form>