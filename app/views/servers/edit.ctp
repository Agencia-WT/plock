<h2>Editar Servidor '<?php echo $server['Server']['nome'] ?>'</h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="ServerEditForm" method="post" action="" accept-charset="utf-8">
	<fieldset>
		<legend>Dados do Servidor</legend>
		<div class="row">
			<div class="span8">
				<div class="clearfix">
				     <label for="server_nome">Nome</label>
				     <div class="input">
				         <input class="xlarge" id="server_nome" name="data[Server][nome]" value="<?php echo $server['Server']['nome']?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="server_url">URL</label>
				     <div class="input">
				         <input class="xlarge" id="server_url" name="data[Server][url]" value="<?php echo $server['Server']['url']?>" size="30" type="text" tabindex="2" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="server_usuario">Usuário</label>
				     <div class="input">
				         <input class="xlarge" id="server_usuario" name="data[Server][usuario]" value="<?php echo $server['Server']['usuario']?>" size="30" type="text" tabindex="3" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="server_senha">Senha</label>
				     <div class="input">
				         <input class="xlarge" id="server_senha" name="data[Server][senha]" value="<?php echo $server['Server']['senha']?>"size="30" type="text" tabindex="4" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="server_ip">IP</label>
				     <div class="input">
				         <input class="xlarge" id="server_ip" name="data[Server][ip]" value="<?php echo $server['Server']['ip']?>"size="30" type="text" tabindex="5" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="actions"> 
					<input type="hidden" name="data[Server][id]" value="<?php echo $server['Server']['id'] ?>">
				    <button class="btn primary" tabindex="6">Salvar Servidor</button>
				
					<input type="button" class="btn " value="Cancelar" onClick="history.back();" tabindex="7">
				</div><!-- /actions -->
			</div>
		</div>
	</fieldset>
</form>