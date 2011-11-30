<?php echo $this->Session->flash('auth'); ?>
<h1>Editar mensagem</h1>
<hr>
<button class="btn small danger" data-controls-modal="modal-delete-mensagem" data-backdrop="true" data-keyboard="true" >Deletar mensagem</button>
<hr>

<div class="row">
	<div class="span11">
		<form method="post" action="<?php echo Configure::read('BASE_URL') ?>/messages/edit/<?php echo $message['Message']['id'] ?>">
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
					<input type="text" name="data[Message][title]" id="titulo" class="xlarge <?php echo $class ?>" value="<?php echo $message['Message']['title'] ?>">
				</div>
			</div>
			<div class="clearfix">
				<label for="textarea">Conteudo</label>
				<div class="input">
					<textarea class="xxlarge" id="textarea" rows="3" name="data[Message][content]"><?php echo $message['Message']['content'] ?> </textarea>
					<span class="help-block">Permitido o uso das tags de HTML</span>
				</div>
			</div>
			<div class="clearfix">
				<label for="textarea">Tipo de mensagem</label>
				<div class="input">
					<ul class="inputs-list">
						<li>
							<label>
								<input type="radio" checked name="data[Message][type]"  <?php if($message['Message']['type'] == 'comunicado') echo 'checked'; ?>value="comunicado">
								<span>Comunicado</span>
							</label>
						</li>		
						<li>
							<label>
								<input type="radio" name="data[Message][type]" <?php if($message['Message']['type'] == 'importante') echo 'checked'; ?> value="importante">
								<span>Comunicado importante</span>
							</label>
						</li>										
						<li>
							<label>
								<input type="radio" name="data[Message][type]" <?php if($message['Message']['type'] == 'urgente') echo 'checked'; ?> value="urgente" >
								<span>Mensagem urgente</span>
							</label>
						</li>					
					</ul>
					<span class="help-block"><strong>Nota:</strong> caso seja selecionada a opção "Urgente" um email será enviado para todos os usuários do sistema</span>
				</div>
			</div>
			<div class="clearfix">
				<label for="status">Status</label>
				<div class='input'>
					<?php
					$active = '';
					$disabled = '';
					
					if($message['Message']['status'] == 'active'){
						$active = 'checked';
					}else{
						$disabled = 'checked';
					}
					?>
					<ul class="inputs-list">
						<li>
							<label>
								<input type="radio"  name="data[Message][status]"  <?php echo $active; ?> value="active">
								<span>Ativa</span>
							</label>
						</li>
						<li>
							<label>
								<input type="radio"  name="data[Message][status]"  <?php echo $disabled; ?> value="disabled">
								<span>Desativada</span>
							</label>
						</li>						
					</ul>
				</div>
			</div>
			<div class="actions">
				<input type="hidden" name="data[Message][users_id]" value="<?php echo $user['User']['id'] ?>">
				<input type="hidden" name="data[Message][id]" value="<?php echo $message['Message']['id'] ?>">
				<button type="submit" class="btn primary">Atualizar</button>
				&nbsp;
				<button type="reset" class="btn">Cancelar</button>
			</div>			
		</fiedset>
		</form>
	</div>
</div>

<div id="modal-delete-mensagem" class="modal hide fade">
            <div class="modal-header">
              <a href="#" class="close">&times;</a>
              <h3>Calma ...</h3>
            </div>
            <div class="modal-body">
              <p>Deseja realmente apagar esta mensagem?</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo Configure::read('BASE_URL'); ?>messages/delete/<?php echo $message['Message']['id'] ?>" class="btn primary" >Sim</a>
              <a href="#" class="btn secondary closemodal">Não!</a>
            </div>
</div>
