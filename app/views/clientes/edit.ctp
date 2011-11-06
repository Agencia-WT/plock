<h2>Editar Cliente <?php echo $cliente['Cliente']['nome'] ?> </h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="ClienteAddForm" method="post" action="" accept-charset="utf-8">

		<div class="row">
			<div class="span8">
				<fieldset>
					<legend>Dados Pessoais</legend>
					<div class="clearfix">
					     <label for="cliente_nome">Nome</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_nome" name="data[Cliente][nome]" value="<?php echo $cliente['Cliente']['nome'] ?>" size="30" type="text" tabindex="1" />
					      </div>
					</div><!-- /clearfix -->
					<div class="clearfix">
					     <label for="cliente_contato1">Contato 1</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_contato1" name="data[Cliente][contato_1]" value="<?php echo $cliente['Cliente']['contato_1'] ?>" size="30" type="text" tabindex="2" />
					      </div>
					</div><!-- /clearfix -->
					<div class="clearfix">
					     <label for="cliente_contato2">Contato 2</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_contato2" name="data[Cliente][contato_2]" value="<?php echo $cliente['Cliente']['contato_2'] ?>" size="30" type="text" tabindex="3" />
					      </div>
					</div><!-- /clearfix -->
					<div class="clearfix">
					     <label for="cliente_telefone1">Telefone 1</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_telefone1" name="data[Cliente][telefone_1]" value="<?php echo $cliente['Cliente']['telefone_1'] ?>" size="30" type="text" tabindex="4" />
					      </div>
					</div><!-- /clearfix -->
					<div class="clearfix">
					     <label for="cliente_telefone2">Telefone 2</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_telefone2" name="data[Cliente][telefone_2]" value="<?php echo $cliente['Cliente']['telefone_2'] ?>" size="30" type="text" tabindex="5" />
					      </div>
					</div><!-- /clearfix -->				
				</fieldset>
				<hr>
				<fieldset>
					<legend>Email</legend>
					<br/>
					<div class="clearfix">
					     <label for="cliente_email1">Email 1</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_email1" name="data[Cliente][email_1]" value="<?php echo $cliente['Cliente']['email_1'] ?>" size="30" type="text" tabindex="6" />
					      </div>
					</div><!-- /clearfix -->
					<div class="clearfix">
					     <label for="cliente_senha1">Senha 1</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_senha1" name="data[Cliente][senha_1]" value="<?php echo $cliente['Cliente']['senha_1'] ?>" size="30" type="text" tabindex="7" />
					      </div>
					</div><!-- /clearfix -->				
					<div class="clearfix">
					     <label for="cliente_email2">Email 2</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_email2" name="data[Cliente][email_2]" value="<?php echo $cliente['Cliente']['email_2'] ?>" size="30" type="text" tabindex="8" />
					      </div>
					</div><!-- /clearfix -->
					<div class="clearfix">
					     <label for="cliente_senha2">Senha 2</label>
					     <div class="input">
					         <input class="xlarge" id="cliente_senha2" name="data[Cliente][senha_2]" value="<?php echo $cliente['Cliente']['senha_2'] ?>" size="30" type="text" tabindex="9" />
					      </div>
					</div><!-- /clearfix -->
				</fieldset>	<!-- /fieldset -->			
			</div><!-- /span6 -->	
			<div class="span8">
				<div class="clearfix">
					<fieldset>
					<legend style="padding-left:0px">Domínios</legend>
					<table class="zebra-striped" id="tableClientes">
						<thead>
							<tr>
								<td>Url</td>
								<td>#</td>
							</tr>
						</thead>
						<tbody>
				        <?php foreach ( $cliente['Dominio'] as $d ) { 
							echo '<tr>';
							echo '<td>'.$d['url']."</td>";
							echo '<td>'.$this->Html->link("editar", "/dominios/edit/".$d['id']).'</td>';
							echo '</tr>';
						 } ?>
						</tbody>
					</table>
					</fieldset>
				</div><!-- /clearfix -->
				<hr>
				<fieldset>
					<div class="clearfix">
					     <label for="cliente_observacoes">Observações</label>
					     <div class="input">
					        <textarea class="span5" id="cliente_observacoes" rows="10" name="data[Cliente][observacoes]" tabindex="10" ><?php echo $cliente['Cliente']['observacoes'] ?></textarea> 
							<span class="help-block">
								Digite aqui informações complementares como endereço, sites de referência para o projeto, etc ..
							</span>
					      </div>
					</div><!-- /clearfix -->
				</fieldset>
				<hr>				
				<div class="actions"> 
					<input type="hidden" name="data[Cliente][id]" value="<?php echo $cliente['Cliente']['id'] ?>">
				    <button class="btn primary" tabindex="11">Salvar Cliente</button>
					<input type="button" class="btn" onClick="history.back();" value="Cancelar" tabindex="12">
				</div><!-- /actions -->								
			</div>	
		</div>
</form>