<h2>Cadastrar Cliente</h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="ClienteAddForm" method="post" action="/plock/clientes/add" accept-charset="utf-8">
	<fieldset>
		<legend>Dados Pessoais</legend>
		<div class="row">
			<div class="span8">
				
				<div class="clearfix">
				     <label for="xlInput">Nome</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][nome]" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Contato 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][contato_1]" size="30" type="text" tabindex="2" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Contato 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][contato_2]" size="30" type="text" tabindex="3" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Telefone 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][telefone_1]" size="30" type="text" tabindex="4" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Telefone 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][telefone_2]" size="30" type="text" tabindex="5" />
				      </div>
				</div><!-- /clearfix -->				
				<hr>
				<legend>Email</legend>
				<br/>
				<div class="clearfix">
				     <label for="xlInput">Email 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][email_1]" size="30" type="text" tabindex="6" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha 1</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][senha_1]" size="30" type="text" tabindex="7" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="xlInput">Email 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][email_2]" size="30" type="text" tabindex="8" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha 2</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][senha_2]" size="30" type="text" tabindex="9" />
				      </div>
				</div><!-- /clearfix -->				
			</div><!-- /span6 -->	
			<div class="span8">

				<div class="clearfix">
				     <label for="xlInput">FTP</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][ftp]" size="30" type="text" tabindex="10" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Usuário do FTP</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][usuario_ftp]" size="30" type="text" tabindex="11" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="xlInput">Senha do FTP</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Cliente][senha_ftp]" size="30" type="text" tabindex="12" />
				      </div>
				</div><!-- /clearfix -->
				<hr>
				<div class="clearfix">
				     <label for="xlInput">Observações</label>
				     <div class="input">
				        <textarea class="span5" id="textarea2" rows="10" name="data[Cliente][observacoes]"></textarea> 
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