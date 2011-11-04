<h2>Editar Servidor '<?php echo $server['Server']['nome'] ?>'</h2>
<hr>
<?php echo $this->Session->flash(); ?>
<form id="ServerEditForm" method="post" action="" accept-charset="utf-8">
	<fieldset>
		<legend>Dados do Servidor</legend>
		<div class="row">
			<div class="span8">
				<div class="clearfix">
				     <label for="xlInput">Nome</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][nome]" value="<?php echo $server['Server']['nome']?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="xlInput">URL</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][url]" value="<?php echo $server['Server']['url']?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Usuário</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][usuario]" value="<?php echo $server['Server']['usuario']?>" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][senha]" value="<?php echo $server['Server']['senha']?>"size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">IP</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][ip]" value="<?php echo $server['Server']['ip']?>"size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="actions"> 
					<input type="hidden" name="data[Server][id]" value="<?php echo $server['Server']['id'] ?>">
				    <button class="btn primary">Salvar Servidor</button>
				
					<input type="button" class="btn " value="Cancelar" onClick="history.back();">
				</div><!-- /actions -->
			</div>
		</div>
	</fieldset>
</form>