<?php echo $this->Session->flash('auth'); ?>
<h1>Criar mensagem</h1>

<div class="row">
	<div class="span11">
		<form method="post" action="<?php echo Configure::read('BASE_URL') ?>messages/add">
		<fieldset>
			<div class="clearfix">
				<label for="titulo">Titulo</label>
				<div class="input">
					<?php if(@$this->validationErrors['Message']['title'] == 'Titulo obrigatório' )
					{
						$class = 'error';
					}
					else
					{
						$class = '';
					} ?>
					<input type="text" name="data[Message][title]" id="titulo" class="xlarge <?php echo $class ?>">
				</div>
			</div>
			<div class="clearfix">
				<label for="textarea">Conteudo</label>
				<div class="input">
					<textarea class="xxlarge" id="textarea" rows="3" name="data[Message][content]"></textarea>
					<span class="help-block">Permitido o uso das tags de HTML</span>
				</div>
			</div>
			<div class="clearfix">
				<label for="textarea">Tipo de mensagem</label>
				<div class="input">
					<ul class="inputs-list">
						<li>
							<label>
								<input type="radio" checked name="data[Message][type]" value="comunicado">
								<span>Comunicado</span>
							</label>
						</li>		
						<li>
							<label>
								<input type="radio" name="data[Message][type]" value="importante">
								<span>Comunicado importante</span>
							</label>
						</li>										
						<li>
							<label>
								<input type="radio" name="data[Message][type]" value="urgente">
								<span>Mensagem urgente</span>
							</label>
						</li>					
					</ul>
					<span class="help-block"><strong>Nota:</strong> caso seja selecionada a opção "Urgente" um email será enviado para todos os usuários do sistema</span>
				</div>
			</div>
			<div class="actions">
				<input type="hidden" name="data[Message][users_id]" value="<?php echo $user['User']['id'] ?>">
				<button type="submit" class="btn primary">Salvar</button>
				&nbsp;
				<button type="reset" class="btn">Cancelar</button>
			</div>			
		</fiedset>
		</form>
	</div>
</div>
