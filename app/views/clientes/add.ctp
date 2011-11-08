<h2>Cadastrar Cliente</h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="ClienteAddForm" method="post" action="<?php echo Configure::read('BASE_URL'); ?>clientes/add" accept-charset="utf-8">
	<fieldset>
		<legend>Dados Pessoais</legend>
		<div class="row">
			<div class="span8">
				
				<div class="clearfix">
				     <label for="cliente_nome">Nome</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_nome" name="data[Cliente][nome]" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="cliente_contato1">Contato 1</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_contato1" name="data[Cliente][contato_1]" size="30" type="text" tabindex="2" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="cliente_contato2">Contato 2</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_contato2" name="data[Cliente][contato_2]" size="30" type="text" tabindex="3" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="cliente_telefone1">Telefone 1</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_telefone1" name="data[Cliente][telefone_1]" size="30" type="text" tabindex="4" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="cliente_telefone2">Telefone 2</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_telefone2" name="data[Cliente][telefone_2]" size="30" type="text" tabindex="5" />
				      </div>
				</div><!-- /clearfix -->				
				<hr>
				<legend>Email</legend>
				<br/>
				<div class="clearfix">
				     <label for="cliente_email1">Email 1</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_email1" name="data[Cliente][email_1]" size="30" type="text" tabindex="6" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="cliente_senha1">Senha 1</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_senha1" name="data[Cliente][senha_1]" size="30" type="text" tabindex="7" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="cliente_email2">Email 2</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_email2" name="data[Cliente][email_2]" size="30" type="text" tabindex="8" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="cliente_senha2">Senha 2</label>
				     <div class="input">
				         <input class="xlarge" id="cliente_senha2" name="data[Cliente][senha_2]" size="30" type="text" tabindex="9" />
				      </div>
				</div><!-- /clearfix -->				
			</div><!-- /span6 -->	
			<div class="span8">
				<div class="clearfix">
				     <label for="dominio">Domínio</label>
				     <div class="input">
				         <input class="xlarge" id="dominio" name="data[Cliente][url]" placeholder="ex: www.teste.com.br" size="30" type="text" tabindex="10" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="servidor">Servidor</label>
				     <div class="input">
				         <select id="servidor" name="data[Cliente][servers_id]" tabindex="11">
				         	<option value="">---</option>
						 	<?php foreach($servers as $s){ ?>
								<option value="<?php echo $s['Server']['id'] ?>"><?php echo $s['Server']['nome'] ?></option>
							<?php } ?>
						 </select>
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="ftp_host">FTP Host</label>
				     <div class="input">
				         <input class="xlarge" id="ftp_host" name="data[Cliente][ftp_host]" placeholder="ex: ftp.teste.com.br" size="30" type="text" tabindex="12" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="ftp_usuario">FTP Usuário</label>
				     <div class="input">
				         <input class="xlarge" id="ftp_usuario" name="data[Cliente][ftp_username]" placeholder="ex: teste" size="30" type="text" tabindex="13" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="ftp_senha">FTP Senha</label>
				     <div class="input">
				         <input class="xlarge" id="ftp_senha" name="data[Cliente][ftp_password]" placeholder="ex: 8ks7Jnsj2" size="30" type="text" tabindex="14" />
				      </div>
				</div><!-- /clearfix -->
				<hr>
				<div class="clearfix">
				     <label for="cliente_observacoes">Observações</label>
				     <div class="input">
				        <textarea class="span5" id="cliente_observacoes" rows="10" name="data[Cliente][observacoes]" tabindex="15"></textarea> 
						<span class="help-block">
							Digite aqui informações complementares como endereço, sites de referência para o projeto, etc ..
						</span>
				      </div>
				</div><!-- /clearfix -->
				<hr>				
				<div class="actions"> 
				    <button class="btn primary" tabindex="15">Salvar Cliente</button>
				</div><!-- /actions -->								
			</div>	
		</div>
	</fieldset>
</form>