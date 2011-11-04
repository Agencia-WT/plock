<h2>Cadastrar Servidor</h2>
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
				         <input class="xlarge" id="xlInput" name="data[Server][nome]" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="clearfix">
				     <label for="xlInput">URL</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][url]" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Usuário</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][usuario]" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">Senha</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][senha]" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->
				<div class="clearfix">
				     <label for="xlInput">IP</label>
				     <div class="input">
				         <input class="xlarge" id="xlInput" name="data[Server][ip]" size="30" type="text" tabindex="1" />
				      </div>
				</div><!-- /clearfix -->				
				<div class="actions"> 
				    <button class="btn primary">Cadastrar Servidor</button>
					<input type="button" class="btn " value="Cancelar" onClick="history.back();">
				</div><!-- /actions -->
			</div>
		</div>
	</fieldset>
</form>